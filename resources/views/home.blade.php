@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ Route('comics.index') }}" class="btn btn-primary">Visualizza i fumetti</a>
            </div>
        </div>
    </div>
@endsection