<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/style.css') }}
        {{ assets.outputCss() }}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistema de Información de la Interventoría Buen Comienzo">
        <meta name="author" content="Julián Camilo Marín Sánchez">
    </head>
    <body>
        {{ content() }}
        {{ javascript_include('js/jquery/jquery.min.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include('js/utils.js') }}
        {{ assets.outputJs() }}
    </body>
</html>