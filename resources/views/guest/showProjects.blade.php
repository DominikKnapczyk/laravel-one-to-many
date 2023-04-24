@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 col-md-8 offset-md-2">
      <h2 class="my-3">{{ $post->title }}</h2>
      <p class="text-muted my-3">{{ $post->slug }}</p>
      <img src="{{ $post->image }}" alt="" class="img-fluid mb-3">
      <p class="mb-3">{{ $post->text }}</p>
      @if ($post->category)
      <div class="category mb-3">
        Categoria: {{ $post->category->label}}
      </div>
      @endif
      @if ($technologies->count() > 0)
      <h3 class="my-3">Tecnologie utilizzate:</h3>
      <ul>
        @foreach ($technologies as $technology)
        <li>{{ $technology->name }}</li>
        @endforeach
      </ul>
      @endif
      <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mt-3">Torna alla lista</a>
    </div>
  </div>
</div>
@endsection