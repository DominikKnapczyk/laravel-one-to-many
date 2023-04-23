@extends('layouts.app')

@section('content')
  <section class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Titolo</th>
          <th scope="col">Abstract</th>
          <th scope="col">Categoria</th>
        </tr>
      </thead>
      <tbody>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @forelse($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->getAbstract() }}</td>
          <td @if (isset($post->category->color)) style="color: {{ $post->category->color }};" @endif>
            @if ($post->category)
              <div class="category">
                {{ $post->category->label}}
              </div>
            @endif
          </td>
          
          <td class="align-middle">
            <a href="{{ route('admin.posts.show', $post) }}">
              <i class="bi bi-eye"></i>
            </a>
          </td>
          <td class="align-middle">
            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-link">
                <i class="bi bi-x-circle text-danger"></i>
              </button>
            </form>
          </td>
        </tr>
        @empty
        @endforelse
      </tbody>
    </table>

    <div class="row">
      <div class="col-10">
        {{ $posts->links() }}
      </div>
      <div class="col-2">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Nuovo post</a>
      </div>
    </div>
  </section>
  
@endsection