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
                    <p>Posted by <strong>Abir</strong> on 16 Jul, 2019</p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eaque eos facere iste laudantium magni nihil nostrum odio odit perspiciatis provident qui quia quibusdam quos, suscipit tenetur unde. Beatae, temporibus?
                    </p>
                    <hr>
                    <p><a href="" class="btn btn-success">Like(0)</a> || <a href=""class="btn btn-secondary">Dislike(0)</a> || <a href="" class="btn btn-warning">Edit</a> || <a href=""class="btn btn-danger">Delete</a></p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
