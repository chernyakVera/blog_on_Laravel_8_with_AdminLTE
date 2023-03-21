@extends('layouts.main')
@section('main_content')

    <div>
        <div>{{ $post->id }}. {{ $post->title }}</div>
        <div>{{ $post->content }}</div>
        <div>{{ $post->image }}</div>
        <div>{{ $post->likes }}</div>
        <div>{{ $post->user->name }}</div>
    </div>

    @can('update', $post)
        <div>
            <a href="{{ route('post.edit', $post->id) }}" class="mt-2 btn btn-info" role="button">Обновить пост</a>
        </div>
    @endcan

    @can('delete', $post)
        <div>
            <form action="{{ route('post.destroy', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="mt-2 btn btn-danger " value="Удалить пост">
            </form>
        </div>
    @endcan

    <div>
        <a href="{{ route('post.index') }}" class="mt-2 btn btn-secondary" role="button">Назад</a>
    </div>

@endsection
