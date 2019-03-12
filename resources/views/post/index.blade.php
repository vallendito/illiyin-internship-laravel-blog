@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @foreach($posts as $post)
                <div class="card mb-3" >
                    <div class="card-header">
                        
                        <a href="{{route('post.show', $post)}}">
                            {{ $post->title }} 
                        </a>{{$post->created_at->diffForHumans()}}
                        <div class="float-right">
                        <a href="{{ route('post.edit',$post) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('post.destroy', $post) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        {{-- <p>{{ $post->content }}</p> --}}
                    <p>{{str_limit($post->content, 100, ' ...')}}</p>
                    </div>
                </div>
            @endforeach

            {!! $posts->render() !!}

        </div>
    </div>
</div>
@endsection