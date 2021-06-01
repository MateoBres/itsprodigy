<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>It's prodigy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="shortcut icon"  type='image/x-icon' href="favicon.ico">
</head>
<body>

    <header class="bg-dark mb-3 shadow-sm border-bottom border-light">
        <nav class="container navbar navbar-expand-lg navbar-dark">
            <a class="nav-item nav-link" href="/itsprodigy">
                <button type="button" class="btn btn-dark btn-outline-light mb-3">Tornare alla lista</button>
            </a>
            <div>
                <div>
                    <form method="get" action="/search/">
                        <div class="form-group d-grid gap-2 d-flex justify-content-between">
                            <input type="text" name="search"
                                   class="form-control" id="search"
                                    placeholder="Nome o categoria">
                            <button class="btn btn-dark btn-outline-light">Cerca</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </header>
