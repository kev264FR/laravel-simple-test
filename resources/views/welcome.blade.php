<x-layout>

    <h1 class="display-1 text-center">Simple Blog</h1>
    <hr>

    @auth()
        <a href="{{route('newPost')}}" class="btn btn-primary">New Article</a>
    @endauth

    @foreach($posts as $post)
        <div class="card my-3">
            <h5 class="card-header">{{$post->user->name}}</h5>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->article}}</p>
                @auth()
                    @if(\Illuminate\Support\Facades\Auth::user() == $post->user)
                        <a href="{{route('editPost', ['post'=>$post->id])}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('deletePost', ['post'=>$post->id])}}" class="btn btn-danger">Delete</a>
                    @endif
                @endauth
            </div>
        </div>
    @endforeach


</x-layout>
