@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
    <h1>Album <small>{{ $text_category->title }}</small></h1>
@endsection

@section('content')


    <div class="box box-solid">

        <div class="box-body">

            <p><strong>Id: </strong> {{$text_category->id}}</p>
            <p><strong>Titulo: </strong>{{$text_category->title}}</p>

            <a class="btn btn-default pull-left" href="{{ route('admin.textos.categorias.index') }}">Cancelar</a>

            <form action="{{ route('admin.textos.categorias.destroy', $text_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="pull-right">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.textos.categorias.edit', $text_category->id) }}"><i class="fa fa-edit"></i> Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar <i class="fa fa-trash"></i></button>
                </div>
            </form>

        </div>
    </div>


@endsection