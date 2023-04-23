@extends('layouts.app')

@section('content')
  <section class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Titolo</th>
          <th scope="col">Abstract</th>
        </tr>
      </thead>
      <tbody>
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
            <a href="{{ route('guest.showProjects', ['post' => $post->id]) }}">
              <i class="bi bi-eye"></i>
          </a>
          
          </td>
        </tr>
        @empty
          <tr>
            <td colspan="3">Non ci sono progetti al momento.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="row">
      <div class="col-12">
        {{ $posts->links() }}
      </div>
    </div>
  </section>
  
@endsection
