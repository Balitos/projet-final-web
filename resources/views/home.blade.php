@extends('layouts.app')

@section('searchBar')
    <form class="d-flex">
        <input class="form-control me-2" id="search-input" name="search" type="search" placeholder="Recherche..." aria-label="Search" style="margin-right: .5em">
        <button class="btn btn-primary" type="submit">Rechercher</button>
    </form>
@endsection

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4" style="justify-conter: center;">
            @foreach($games as $game)
            <div class="col-lg-4 col-sm-6 portfolio-item" style="margin-bottom: 2em;">
                <div class="card h-100" style="width: 18rem; border-radius: 1.1rem; background-color: #333;">
                    <img src="{{ asset('storage/image/' . $game->image) }}" class="card-img-top img-fluid" style="height: 180px; border-top-left-radius: inherit; border-top-right-radius: inherit" alt="game">
                    <div class="card-body" style="background-color: #333; color: white;">
                        <h5 class="card-title">{{ $game->name }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #333; color: white;"><strong>Prix :</strong> {{ $game->price }}</li>
                        <li class="list-group-item" style="background-color: #333; color: white;"><strong>Plateforme :</strong> {{ $game->platform }}</li>
                    </ul>
                    <div class="card-body" style="display: flex; justify-content: space-between; background-color: #333; border-bottom-left-radius: inherit; border-bottom-right-radius: inherit">
                        <a class="btn btn-primary" href="{{ route('member.game.show',$game->id) }}" role="button">Détails</a>
                        <form action="{{ route('cart.store') }}" method="POST" >
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $games->links() }}
    </div>
@endsection

@section('footer')
    <footer>
        <div class="footer-text">
            <p>© 2021 zigaming.fr<span>•</span>Tous Droits Réservés</p>
        </div>
        <div class="footer-text">
            <p>zigaming - Réalisé par Nicolas & Clément - Ynov</p>
        </div>
    </footer>
@endsection