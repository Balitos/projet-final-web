@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="container">
        <a href="{{ route('admin.game.create') }}"><button type="button" class="btn btn-primary" style="margin-bottom: .5em">Ajouter un jeu</button></a>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($games as $game)
            <div class="col-lg-4 col-sm-6 portfolio-item" style="margin-bottom: 2em;">
                <div class="card h-100" style="width: 18rem; border-radius: 1.1rem; background-color: #333;">
                    <img src="{{ asset('storage/image/' . $game->image) }}" class="card-img-top img-fluid" style="height: 180px; border-top-left-radius: inherit; border-top-right-radius: inherit" alt="game">
                    <div class="card-body" style="background-color: #333; color: white;">
                        <h5 class="card-title">{{ $game->name }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #333; color: white;"><strong>Description :</strong> {{ $game->description }}</li>
                        <li class="list-group-item" style="background-color: #333; color: white;"><strong>Quantité :</strong> {{ $game->quantity }}</li>
                        <li class="list-group-item" style="background-color: #333; color: white;"><strong>Code d'activation :</strong> {{ $game->activationCode }}</li>
                        <li class="list-group-item" style="background-color: #333; color: white;"><strong>Prix :</strong> {{ $game->price }}</li>
                        <li class="list-group-item" style="background-color: #333; color: white;"><strong>Plateforme :</strong> {{ $game->platform }}</li>
                    </ul>
                    <div class="card-body" style="display: flex; justify-content: space-between; background-color: #333; border-bottom-left-radius: inherit; border-bottom-right-radius: inherit">
                        <a href="{{ route('admin.game.edit', $game->id) }}"><button class="btn btn-primary">EDIT</button></a>
                        <form action="{{ route('admin.game.destroy', $game) }}" method="POST" style="margin-left: 10px;">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">

    </div>
</div>
@endsection
