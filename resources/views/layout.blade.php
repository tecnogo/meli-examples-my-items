<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tecnogo - Navegación de publicaciones</title>

    <meta property="og:image" content="https://www.tecnogo.com/wp-content/uploads/2019/03/tecnogo-logo.png"/>

    <link rel="shortcut icon" href="https://www.tecnogo.com/wp-content/uploads/2019/03/favicon-32x32-1.png"
          type="image/x-icon"/>
    <link rel="apple-touch-icon" href="https://www.tecnogo.com/wp-content/uploads/2019/03/apple-icon-57x57-1.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="https://www.tecnogo.com/wp-content/uploads/2019/03/apple-icon-114x114-1.png">
    <link href="https://ui.mlstatic.com/chico/2.0.11/ui/chico.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-light" style="position: relative;">
<a href="https://github.com/tecnogo/meli-examples-category-attr-form"
   target="_blank" style="position: absolute; left: 0; right: 0; z-index: 1; width: 200px;">
    <img width="149" height="149"
         src="https://github.blog/wp-content/uploads/2008/12/forkme_left_darkblue_121621.png?resize=149%2C149"
         class="attachment-full size-full" alt="Fork me on GitHub"
         data-recalc-dims="1">
</a>
<div class="container-fluid" id="app">
    <div class="row">
        <div class="col py-5 text-center">
            <a href="https://www.tecnogo.com/" target="_blank">
                <img class="mb-4" src="https://avatars1.githubusercontent.com/u/49149236" alt=""
                     width="72"
                     height="72"
                     title="Tecnogo"
                />
            </a>

            <h2>Navegación de publicaciones de Mercadolibre</h2>
        </div>
    </div>
    @yield('content')
</div>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@yield('script')
</body>
</html>
