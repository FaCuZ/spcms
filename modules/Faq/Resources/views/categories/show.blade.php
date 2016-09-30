@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
    <h1>Categoria <small>{{ $faq_category->title }}</small></h1>
@endsection

@section('content')

    <div class="box box-solid">

        <div class="box-body">

            <p><strong>Id: </strong> {{$faq_category->id}}</p>
            <p><strong>Nombre: </strong>{{$faq_category->title}}</p>

            <a class="btn btn-default pull-left" href="{{ route('admin.faq.categorias.index') }}">Cancelar</a>

            <form action="{{ route('admin.faq.categorias.destroy', $faq_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="pull-right">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.faq.categorias.edit', $faq_category->id) }}"><i class="fa fa-edit"></i> Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar <i class="fa fa-trash"></i></button>
                </div>
            </form>

        </div>
    </div>


@endsection