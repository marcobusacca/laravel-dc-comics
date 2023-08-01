@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">Aggiungi un Nuovo Comic</h2>
                    <a href="{{ Route('comics.index') }}" class="btn btn-dark">Homepage</a>
                </div>
            </div>
            <div class="col-12 mt-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-12 mb-5">
                <form action=" {{ Route('comics.store') }} " method="POST">
                    @csrf
                    <div class="form-group border p-4">
                        <div class="row">
                            <div class="col-12 my-3">
                                <!-- Titolo -->
                                <label class="control-label my-3">Titolo</label>
                                <input type="text" name="title" id="title" placeholder="Inserisci il titolo" class="form-control" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Descrizione -->
                                <label class="control-label my-3">Descrizione</label>
                                <textarea name="description" id="description" placeholder="Inserisci la descrizione" cols="30" rows="10" class="form-control" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Thumb -->
                                <label class="control-label my-3">Thumb</label>
                                <input type="url" name="thumb" id="thumb" placeholder="Inserisci la thumb" class="form-control" value="{{ old('thumb') }}" required>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Cover Image -->
                                <label class="control-label my-3">Cover Image</label>
                                <input type="text" name="cover_image" id="cover_image" placeholder="Inserisci la cover image" class="form-control" value="{{ old('cover_image') }}" required>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Thumb 2 -->
                                <label class="control-label my-3">Thumb 2</label>
                                <input type="url" name="thumb2" id="thumb2" placeholder="Inserisci la thumb 2" class="form-control" value="{{ old('thumb2') }}" required>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Prezzo -->
                                <label class="control-label my-3">Prezzo</label>
                                <input type="text" name="price" id="price" placeholder="Inserisci il prezzo" class="form-control" value="{{ old('price') }}" required>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Serie -->
                                <label class="control-label my-3">Serie</label>
                                <input type="text" name="series" id="series" placeholder="Inserisci la serie" class="form-control" value="{{ old('series') }}" required>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Data di Rilascio -->
                                <label class="control-label my-3">Data di Rilascio</label>
                                <input type="date" name="sale_date" id="sale_date" placeholder="Inserisci la data di rilascio" class="form-control" value="{{ old('sale_date') }}" required>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Tipo -->
                                <label class="control-label my-3">Tipo</label>
                                <input type="text" name="type" id="type" placeholder="Inserisci il tipo" class="form-control" value="{{ old('type') }}" required>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Artisti -->
                                <label class="control-label my-3">Artisti</label>
                                <textarea name="artists" id="artists" placeholder="Inserisci gli artisti" cols="30" rows="3" class="form-control" required>{{ old('artists') }}</textarea>
                            </div>
                            <div class="col-12 my-3">
                                <!-- Scrittori -->
                                <label class="control-label my-3">Scrittori</label>
                                <textarea name="writers" id="writers" placeholder="Inserisci gli scrittori" cols="30" rows="3" class="form-control" required>{{ old('writers') }}</textarea>
                            </div>
                            <div class="col-12 text-center my-5">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-success">Aggiungi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection