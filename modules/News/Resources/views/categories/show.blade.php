@extends('admin::layouts.master')

@section('a-noticias', 'class="active"')

@section('a-contenido', 'active')

@section('header')
    <h1>{!! button('texts') !!} Categoria <small>{{ $news_category->title }}</small></h1>
@endsection

@section('content')

    <div class="box box-solid">

        <div class="box-body">

            <p><strong>Id: </strong> {{$news_category->id}}</p>
            <p><strong>Titulo: </strong>{{$news_category->title}}</p>

            <a class="btn btn-default pull-left" href="{{ route('admin.noticias.categorias.index') }}">Cancelar</a>

            <form action="{{ route('admin.noticias.categorias.destroy', $news_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="pull-right">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.noticias.categorias.edit', $news_category->id) }}"><i class="fa fa-edit"></i> Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar <i class="fa fa-trash"></i></button>
                </div>
            </form>

        </div>
    </div>


@endsection