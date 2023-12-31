@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ Route('comics.index') }}" class="btn btn-dark">Homepage</a>
            </div>
            <div class="col-12 my-5">
                <div class="card">
                    <!-- Card Header -->
                    <div class="card-header d-flex justify-content-center align-items-center text-center">
                        <!-- Title -->
                        <h2 class="fs-4 fw-bold py-2">{{ $comic->title }}</h2>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <!-- Image -->
                            <div class="col-12 col-lg-4 d-flex justify-content-center">
                                <img src="{{ $comic->thumb }}" alt="banner-image" class="img-fluid border border-black border-5">
                            </div>
                            <!-- Details -->
                            <div class="col-12 col-lg-8 d-flex flex-wrap align-items-center">
                                <!-- Description -->
                                <div>
                                    <h3 class="fw-bold py-2">Description</h3>
                                    <hr>
                                    <p>{{ $comic->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Footer -->
                    <div class="card-footer">
                        <div class="row">
                            <!-- Artists -->
                            <div class="col-6 my-3 px-5">
                                <h5 class="fw-bold py-2">Artists</h5>
                                <hr>
                                <p>{{ $comic->artists }}</p>
                            </div>
                            <!-- Writers -->
                            <div class="col-6 my-3 px-5">
                                <h5 class="fw-bold py-2">Writers</h5>
                                <hr>
                                <p>{{ $comic->writers }}</p>
                            </div>
                            <!-- Action Button -->
                            <div class="col-12 text-center py-3">
                                <!-- Edit Button -->
                                <a href="{{ Route('comics.edit', $comic) }}" class="btn btn-warning mx-2">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ Route('comics.destroy', $comic) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare questo elemento?')" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection