@extends('layouts.main')
@section('main_content')

    <div>
        This is Posts Create page!
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="m-2 form-group">
                <label for="user_id">Author</label>
                <select class="form-control" id="user_id" name="user_id">
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                </select>
                @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="m-2 form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="m-2 form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" id="content" name="content"
                          placeholder="Enter content">{{ old('content') }}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="m-2 form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}" placeholder="Enter name of image">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="m-2 form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? ' selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="m-2 form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
                @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="m-2 btn btn-primary">Создать</button>
        </form>


    </div>

@endsection
