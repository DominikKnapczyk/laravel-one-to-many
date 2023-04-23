@extends('layouts.app')

@section('content')
  <section class="container">
    <h2 class="my-3">{{ $post->title }}</h2>
    <a href="{{ route('guest.projects') }}">Torna alla lista</a>
    <h3 class="text-muted text-secondary my-3">{{ $post->slug }}</h3>
    <img src="{{ $post->image }}" alt="" width="200" class="float-start me-3 mb-1">
    <p>{{ $post->text }}</p>
    @if ($post->category)
    <div class="category">
      Categoria: {{ $post->category->label}}
    </div>
  @endif
  </section>
@endsection