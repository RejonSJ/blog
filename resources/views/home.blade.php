@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('css')
    <link rel="stylesheet" href="../css/home.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <form>
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <input class="newPostInput" placeholder="Título">
                            </div>
                            <div class="col-12">
                                <textarea class="newPostInput inputTall" placeholder="Contenido"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn btn-primary">
                            POST
                        </div>
                    </div>
                </div>
            </form>
            @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">{{$post->text}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop
