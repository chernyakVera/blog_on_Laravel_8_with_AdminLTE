@extends('layouts.main')
@section('main_content')

    <div>
        This is Posts page!
        @foreach($posts as $post)
            <div>
                <a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a>
            </div>
        @endforeach
    </div>

    @can('create', \App\Models\Post::class)
        <div>
            <a href="{{ route('post.create') }}" class="mt-2 btn btn-success" role="button">Создать пост</a>
        </div>
    @endcan

    <div class="mt-3">
        {{ $posts->withQueryString()->links() }}
    </div>

@endsection
