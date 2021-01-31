@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col" style="margin-top: 35px;">
                        <div class="card" style="width: 40rem;">
                            <img style="height: 150px;" src="{{ asset('storage/image/' . $game->image) }}" class="card-img-top" alt="{{$game->image}}">
                            <div class="card-body">
                                <h5 class="card-title"><strong>Nom :</strong> {{ $game->name }}</h5>
                                <p class="card-text"><strong>Description :</strong> {{ $game->description }}</p>
                                <p class="card-text"><strong>Quantité :</strong> {{ $game->quantity }}</p>
                                <p class="card-text"><strong>Prix :</strong> {{ $game->price }} €</p>
                                <p class="card-text"><strong>Plateform :</strong> {{ $game->platform }}</p>
                                <div style="display: flex;">
                                    <form action="{{ route('cart.store') }}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="game_id" value="{{ $game->id }}">
                                        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <h3>Avis : </h3>

                    <a href="{{ route('review.create',$game->id)}}"></a><h3>Ecrivez un avis</h3>
                </div>

    </div>
</div>
@endsection