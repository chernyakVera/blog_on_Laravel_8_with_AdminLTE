@extends('layouts.admin')
@section('content')

    <div>
        This is Admin Posts page!
        @foreach($posts as $post)
            <div>
                <a href="{{ route('admin.post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a>
            </div>
        @endforeach
    </div>
    <div>
        <a href="{{ route('admin.post.create') }}" class="mt-2 btn btn-success" role="button">Создать пост</a>
    </div>
    <div class="mt-3">
        {{ $posts->withQueryString()->links() }}
    </div>

@endsection
