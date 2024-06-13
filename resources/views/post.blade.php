@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('css')
    <link rel="stylesheet" href="../../css/home.css">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">
                                <a class="" href="{{route('profile.getProfile',$post->idUser)}}">
                                    <b>{{$post->name}}</b>
                                </a>
                                 - {{date_format(date_create($post->created_at),"d/m/Y H:i")}}
                            </p>
                        </div>
                        <div class="col-auto">
                            @if ($post->idUser == Auth::user()->id)
                            <div class="btn btn-sm btn-primary" onclick="editar({{json_encode($post)}})">
                                <i class="fas fa-edit fa-fw"></i>
                            </div>
                            <button type="button" class="btn btn-sm btn-danger" title="Eliminar" onclick="eliminar({{$post->id}})"><i class="fas fa-trash-alt fa-fw"></i></button>
                            <form method="post" action="{{route('posts.deletePost',$post->id)}}" id="form-delete-{{$post->id}}">
                                @method('delete')
                                @csrf
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-0"><b>{{$post->title}}</b></p>
                    <p class="mb-0">{{$post->text}}</p>
                    @if ($post->image!=null)
                        <div class="image-container">
                            <img src="{{$post->image}}">
                        </div>
                    @endif
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <form method="post" id="storePost" action="{{route('replies.createReply')}}">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="idUser" value="{{Auth::user()->id}}">
                            <input type="hidden" name="idPost" value="{{$post->id}}">
                            <div class="row">
                                <div class="col">
                                    <input class="newPostInput reply" placeholder="Comentar" id="textNewPost" name="text">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                    @foreach ($replies as $reply)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-0">
                                        <a class="" href="{{route('profile.getProfile',$reply->idUser)}}">
                                            <b>{{$reply->name}}</b>
                                        </a>
                                         - {{date_format(date_create($reply->created_at),"d/m/Y H:i")}}
                                    </p>
                                </div>
                                <div class="col-auto">
                                    @if ($reply->idUser == Auth::user()->id)
                                    <div class="btn btn-sm btn-primary" onclick="editarReply({{json_encode($reply)}})">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger" title="Eliminar" onclick="eliminarReply({{$reply->id}})"><i class="fas fa-trash-alt fa-fw"></i></button>
                                    <form method="post" action="{{route('replies.deleteReply',$reply->id)}}" id="form-delete-reply-{{$reply->id}}">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <p class="mb-0">{{$reply->text}}</p>
                        </li>
                    @endforeach
                  </ul>
            </div>
        </div>
    </div>

    @include('editarPost')
    @include('editarReply')
@stop

@section('js')
<script>
    function eliminar(id){
        Swal.fire({
            title: '¿Deseas eliminar el post?',
            text: "Esta acción es permanente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#form-delete-'+id).submit();
            }
        })
    }
    function eliminarReply(id){
        Swal.fire({
            title: '¿Deseas eliminar el comentario?',
            text: "Esta acción es permanente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#form-delete-reply-'+id).submit();
            }
        })
    }
    function editar(post){
        document.getElementById('idEdit').value = post.id;
        document.getElementById('titleEdit').value = post.title;
        document.getElementById('textEdit').value = post.text;
        $('#editarPost').modal({backdrop: 'static', keyboard: false}, 'show');
    }
    function editarReply(reply){
        document.getElementById('idReplyEdit').value = reply.id;
        document.getElementById('textReplyEdit').value = reply.text;
        $('#editarReply').modal({backdrop: 'static', keyboard: false}, 'show');
    }
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

