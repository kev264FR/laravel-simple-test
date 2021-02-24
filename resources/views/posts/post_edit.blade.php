<x-layout>

    <h1 class="display-1 text-center">Modify article</h1>

    <hr class="mb-5">

    <form method="post">

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
        </div>

        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="" id="article" name="article" style="height: 150px">{{$post->article}}</textarea>
            <label for="article">Article text</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-layout>
