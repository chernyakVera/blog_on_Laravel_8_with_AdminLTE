@extends('layouts.admin')
@section('content')

    <div>
        <div>{{ $post->id }}. {{ $post->title }}</div>
        <div>{{ $post->content }}</div>
        <div>{{ $post->image }}</div>
        <div>{{ $post->likes }}</div>
        <div>{{ $post->user->name }}</div>
    </div>
    <div>
        <a href="{{ route('admin.post.edit', $post->id) }}" class="mt-2 btn btn-info" role="button">Обновить пост</a>
    </div>
    <div>
        <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="mt-2 btn btn-danger " value="Удалить пост">
        </form>
    </div>
    <div>
        <a href="{{ route('admin.post.index') }}" class="mt-2 btn btn-secondary" role="button">Назад</a>
    </div>

@endsection
