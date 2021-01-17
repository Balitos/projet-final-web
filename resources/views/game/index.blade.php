@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liste de jeux</div>
            <div class="card-body">
                <a href="{{ route('game.create') }}"><button type="button" class="btn btn-dark">Ajouter un jeu</button></a>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($games as $game)
                    <div class="col" style="margin-top: 35px;">
                        <div class="card" style="width: 18rem;">
                            <img style="height: 150px;" src="{{ asset('storage/image/' . $game->image) }}" class="card-img-top" alt="{{$game->image}}">
                            <div class="card-body">
                                <h5 class="card-title"><strong>Nom :</strong> {{ $game->name }}</h5>
                                <p class="card-text"><strong>Description :</strong> {{ $game->description }}</p>
                                <p class="card-text"><strong>Quantité :</strong> {{ $game->quantity }}</p>
                                <p class="card-text"><strong>Prix :</strong> {{ $game->price }}</p>
                                <p class="card-text"><strong>Plateform :</strong> {{ $game->platform }}</p>
                                <p class="card-text"><strong>Code d'activation  :</strong> {{ $game->activationCode }}</p>
                                <div style="display: flex;">
                                    <a href="{{ route('game.edit', $game->id) }}"><button class="btn btn-primary">EDIT</button></a>
                                    <form action="{{ route('game.destroy', $game) }}" method="POST" style="margin-left: 10px;">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
