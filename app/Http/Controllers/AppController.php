<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Catturiamo il contenuto dell'API
        $response = @file_get_contents('https://itunes.apple.com/us/rss/toppaidapplications/limit=200/json');
        //Controlliamo che sia andato a buon fine
        if (!strpos($http_response_header[0], "200")) {
            return view('errors/connection_problem');
        }
        //Trasformiamo il contenuto in un array assoc
        $response = json_decode($response,true);
        //Riempiamo il nostro DB con i dati
        foreach($response['feed']['entry'] as $item){
             $App = new App();
             $App->name = ($item['im:name']['label'])??null;
             //Creo un array di immagini e lo passo come string al db
             $images = [];
             foreach( $item['im:image'] as $image){
                 $images[] = $image['label'];
             }
             $App->image = (implode(', ', $images))??null;
             $App->summary = ($item['summary']['label'])??null;
             $App->price = ($item['im:price']['label'])??null;
             $App->type = ($item['im:contentType']['attributes']['label'])??null;
             $App->rights = ($item['rights']['label'])??null;
             $App->title = ($item['title']['label'])??null;
             $App->link = ($item['link'][0]['attributes']['href'].', '.$item['link'][1]['attributes']['href'])??null;
             $App->artist = ($item['im:artist']['label'])??null;
             $App->category = ($item['category']['attributes']['label'])??null;
             $App->releaseDate = ($item['im:releaseDate']['attributes']['label'])??null;
             $App->save();
            }
            //Mostriamo i dati con la paginazione di 15
            $apps = App::paginate(15);

            return view('itsprodigy',
                ['apps'=>$apps]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Cerchiamo l'app per id e se non la troviamo mostriamo view('errors/404')
        $App = App::where('idApp', $id)->firstOrFail();
        return view('/show', ['app'=>$App]);
    }

    /**
     * Display the specified resources.
     *

     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //Catturo il valore di ricerca scritto dal user
        $search = $request->query('search');
        //Faccio un petizione filtrata al db in base a nome e categoria
        $apps = App::where('apps.name', 'like', '%'.$search.'%')
            ->orWhere('apps.category', 'like', '%'.$search.'%')
            ->orderBy('apps.name')
            ->paginate(15);

        return view('/search',
            [
                'apps'=>$apps,
                'search'=>$search
            ]
        );
    }
}
