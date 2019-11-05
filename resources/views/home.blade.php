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
                    <p>Posted by <strong>{{ $post->user->name }}</strong> on {{ $post->created_at }}</p>
                    <p> {{ $post->body }} </p>
                    <hr>
                    <p> <form action="/posts/{{ $post->id }}" method="post" > @csrf
                            <a href="change-like/{{$post->id}}" class="btn btn-success like">
                                @if($post->likes)
                                    @if($post->likes->like == 0)
                                        Like
                                    @elseif($post->likes->like == 1)
                                        Unlike
                                    @endif
                                    @else Unlike
                                @endif

                            </a>
                        @if(Auth::user() == $post->user)

                                || <button formaction="/posts/{{ $post->id
                    }}/edit" type="submit" name="_method" value="GET" class="btn
                    btn-warning">Edit</button> || <button type="submit" name="_method" value="DELETE" class="btn
                            btn-danger"/>Delete</button>

                        @endif
                        </form>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
