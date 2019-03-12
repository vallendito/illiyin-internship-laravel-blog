@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3" >
                    <div class="card-header">
                        {{ $post->title }} || <strong>{{ $post->category->name }}</strong>
                    </div>

                    <div class="card-body">
                        {{-- <p>{{ $post->content }}</p> --}}
                    <p>{{ $post->content }}</p>
                    </div>
                </div>

                <div class="card mb-3" >
                        <div class="card-header">
                            Add Comment
                        </div>

                        @foreach ($post->comments()->get() as $comment)
                            <div class="card-body">
                            
                            <h3>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h3>
                            
                            <p>{{ $comment->message }}</p>

                            </div>
                        @endforeach
    
                        <div class="card-body">
                        <form action="{{ route('post.comment.store', $post) }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <textarea name="message" rows="5" class="form-control" placeholder="Comment Here"></textarea>
                                <br>
                                <input type="submit" value="Comment" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
            </div>

        </div>
    </div>
@endsection