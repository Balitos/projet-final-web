@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card-body">
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
                                            <a class="btn btn-primary" href="{{ route('member.game.show',$game->id) }}" role="button">Détails</a>           
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                </div>
    </div>
@endsection