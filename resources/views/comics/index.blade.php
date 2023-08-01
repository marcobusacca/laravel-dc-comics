@extends('layouts.app')

@section('content')
    <div class="index-page">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{ Route('comics.create') }}" class="btn btn-success">Aggiungi Comic</a>
                </div>
                @forelse ($comics as $comic)
                    <div class="col-12 col-md-6 col-lg-4 my-5">
                        <div class="card h-100">
                            <!-- Card Image -->
                            <img src="{{ $comic->thumb }}" alt="cover-image" class="card-img-top border border-5">
                            <!-- Card Header -->
                            <div class="card-header d-flex justify-content-center align-items-center text-center">
                                <!-- Title -->
                                <h2 class="fs-4 fw-bold py-2">{{ $comic->title }}</h2>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Series -->
                                <div>
                                    <strong>Series:</strong>
                                    <span>{{ $comic->series }}</span>
                                </div>
                                <!-- Type -->
                                <div>
                                    <strong>Type:</strong>
                                    <span>{{ $comic->type }}</span>
                                </div>
                                <!-- Price -->
                                <div>
                                    <strong>Price:</strong>
                                    <span>{{ $comic->price }}</span>
                                </div>
                                <!-- Sale Date -->
                                <div>
                                    <strong>Sale Date:</strong>
                                    <span>{{ $comic->sale_date }}</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer d-flex justify-content-center align-items-center">
                                <!-- Show Button -->
                                <a href="{{ Route('comics.show', $comic->id) }}" class="btn btn-primary mx-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ Route('comics.edit', $comic) }}" class="btn btn-warning mx-2">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <!-- Delete Button -->
                                <a href="#" class="btn btn-danger mx-2">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 col-md-6 col-lg-4">
                        <h3>Comic not Found!</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection