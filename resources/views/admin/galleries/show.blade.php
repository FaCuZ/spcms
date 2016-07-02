@extends('admin.layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
    <h1>Galeria <small>{{ $gallery->title }}</small></h1>
@endsection

@section('content')


    <div class="box">

        <div class="box-body">

            <p><strong>Id: </strong> {{$gallery->id}}</p>           
            <p><strong>Titulo: </strong>{{$gallery->title}}</p>

            <strong>Cuerpo: </strong>
            <p>{{$gallery->description}}</p>


            <a class="btn btn-default pull-left" href="{{ route('admin.galerias.index') }}">Cancelar</a>

            <form action="{{ route('admin.galerias.destroy', $gallery->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que quiere borrarlo?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="pull-right">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.galerias.edit', $gallery->id) }}"><i class="fa fa-edit"></i> Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar <i class="fa fa-trash"></i></button>
                </div>
            </form>

        </div>
    </div>


@endsection