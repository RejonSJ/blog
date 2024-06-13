@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('css')
    <link rel="stylesheet" href="../css/home.css">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-lg-6">
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
                            <div class="col-12">
                                <input type="file" class="" placeholder="Contenido" id="imageNewPost" name="image">
                                <input type="hidden" id="b64NewPost" name="imageB64">
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
                <a class="card-footer bg-secondary footer-btn" href="{{route('posts.detailPost',$post->id)}}">
                    <i class="fas fa-comment"></i> Comentarios
                </a>
            </div>
            @endforeach
        </div>
    </div>

    @include('editarPost')
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
    function editar(post){
        document.getElementById('idEdit').value = post.id;
        document.getElementById('titleEdit').value = post.title;
        document.getElementById('textEdit').value = post.text;
        $('#editarPost').modal({backdrop: 'static', keyboard: false}, 'show');
    }
    function readFile() {
    
    if (!this.files || !this.files[0]) return;
        
    const FR = new FileReader();
        
    FR.addEventListener("load", function(evt) {
        document.querySelector("#b64NewPost").value = evt.target.result;
    }); 
        
    FR.readAsDataURL(this.files[0]);
    
    }

    document.querySelector("#imageNewPost").addEventListener("change", readFile);
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

