@extends('admin::layouts.master')

@section('a-links', 'class="active"')

@section('a-contenido', 'active')

@section('header')
    <h1>{!! button('links') !!} Categoria <small>{{ $link_category->title }}</small></h1>
@endsection

@section('content')

    <div class="box box-solid">

        <div class="box-body">

            <p><strong>Id: </strong> {{$link_category->id}}</p>
            <p><strong>Titulo: </strong>{{$link_category->title}}</p>

            <a class="btn btn-default pull-left" href="{{ route('admin.links.categorias.index') }}">Cancelar</a>

            <form action="{{ route('admin.links.categorias.destroy', $link_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="pull-right">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.links.categorias.edit', $link_category->id) }}"><i class="fa fa-edit"></i> Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar <i class="fa fa-trash"></i></button>
                </div>
            </form>

        </div>
    </div>


@endsection