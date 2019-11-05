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

                        <form action="{{ route('posts.update', $posts->id) }}" class="form-group" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <textarea name="body" id="" rows="5" class="form-control border
                            border-success">{{ $posts->body }}</textarea>
                            <input type="submit" value="Submit" class="mt-2 form-control btn btn-lg btn-success">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
