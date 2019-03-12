@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">Edit Post</div>

                    <div class="card-body">
                        <form action="{{ route('post.update', $post) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Post title" value="{{$post->title}}">
                            </div>
                
                            <div class="form-group">
                                <label for="">Categories</label>
                                <select name="category_id"  class="form-control">
                                    @foreach($categories as $category)
                                        <option 
                                        value="{{ $category->id }}"
                                        @if ($category->id === $post->category_id)
                                            selected
                                        @endif
                                        >
                                        {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label for="">Content</label>
                            <textarea name="content" rows="5" class="form-control" placeholder="Post content">{{$post->content}}</textarea>
                            </div>
                
                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection