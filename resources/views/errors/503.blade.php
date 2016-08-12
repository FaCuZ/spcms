@inject('textos',    'Modules\Texts\Models\Text')
@inject('categorias','Modules\Texts\Models\TextCategory')
@inject('albumes',   'Modules\Images\Models\Album')
@inject('imagenes',  'Modules\Images\Models\Image')

<!DOCTYPE html>
<html>
    <head>
        <title>{{ $textos->texto("titulo") }}</title>

        <link rel="stylesheet" href="{{ URL::asset('css/offline.css') }}">

    </head>

    <body>
        <div class="centrar">
            <img src="{{ $imagenes->imagen("logo")->url }}" />
            <div class="informacion">{{ $textos->texto("Informacion") }}</div>
        </div>
    </body>

</html>