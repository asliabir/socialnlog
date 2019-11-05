@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{ route('posts.store') }}" class="form-group" method="post">
                            @csrf
                            <textarea name="body" id="" rows="5" class="form-control border border-success"></textarea>
                            <input type="submit" value="Submit" class="mt-2 form-control btn btn-lg btn-success">
                        </form>
                </div>
                <hr>
                <div class="card-body">
                    @foreach($posts as $post)
                    <p>Posted by <strong>Abir</strong> on 16 Jul, 2019</p>
                    <p> {{ $post->body }} </p>
                    <hr>
                    <p><a href="" class="btn btn-success">Like({{ $post->like }})</a> || <a href=""class="btn btn-secondary">Dislike({{ $post->dislike }})</a> || <a href="" class="btn btn-warning">Edit</a> || <a href=""class="btn btn-danger">Delete</a></p>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
