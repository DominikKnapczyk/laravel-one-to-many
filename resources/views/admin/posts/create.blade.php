@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Crea un nuovo post</h1>
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Testo</label>
                        <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="10" required>{{ old('text') }}</textarea>
                        @error('text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Immagine</label>
                        <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" required>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="category_id">Categoria</label>
                      <select name="category_id" id="category_id" class="form-control">
                         <option value="">Non Categorizzato</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->label }}</option>
                          @endforeach
                      </select>
                      <div class="form-group">
                        <label>Tecnologie</label>
                        @foreach($technologies as $technology)
                            <div>
                                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                                <label>{{ $technology->name }}</label>
                            </div>
                        @endforeach
                      </div>
                  </div>                
                    <button type="submit" class="btn btn-primary my-3">Pubblica</button>
                </form>
            </div>
        </div>
    </div>
@endsection
