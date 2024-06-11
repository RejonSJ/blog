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
            <form method="post" id="storePost" action="{{route('posts.createPost')}}">
                @method('POST')
                @csrf
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <input class="newPostInput" placeholder="Título" id="titleNewPost" name="title">
                            </div>
                            <div class="col-12">
                                <textarea class="newPostInput inputTall" placeholder="Contenido" id="textNewPost" name="text"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="idUser" value="{{Auth::user()->id}}">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            POST
                        </button>
                    </div>
                </div>
            </form>
            @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">{{$post->name}}</p>                            
                        </div>
                        <div class="col-auto">
                            @if ($post->idUser == Auth::user()->id)
                            <div class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </div> 
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-0"><b>{{$post->title}}</b></p>
                    <p class="mb-0">{{$post->text}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop

@section('js')
<script>
</script>
@if(Session::has('success'))
<script>
    Swal.fire({
        position: 'top-end',
        text: "{{$message = Session::get('success')}}",
        icon: 'success',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        toast: true,
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
    })
</script>
@endif
@if(Session::has('error'))
<script>
    Swal.fire({
        position: 'top-end',
        text: "{{$message = Session::get('error')}}",
        icon: 'error',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        toast: true,
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
    })
</script>
@endif
@stop

