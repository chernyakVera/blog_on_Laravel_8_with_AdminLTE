@extends('layouts.main')
@section('main_content')

    <div>
        This is Posts Update page!
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mt-2 form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                       value="{{ $post->title }}">
            </div>
            <div class="mt-2 form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" id="content" name="content"
                          placeholder="Content">{{ $post->content }}</textarea>
            </div>
            <div class="mt-2 form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image" placeholder="image"
                       value="{{ $post->image }}">
            </div>
            <div class="m-2 form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option {{ $category->id == $post->category->id ? ' selected' : '' }}
                                value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="m-2 form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                            {{ $tag->id == $postTag->id ? ' selected' : '' }}
                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Обновить</button>
        </form>
    </div>

@endsection
