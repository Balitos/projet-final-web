@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h3>Profile {{ $user -> name }}</h3> </div>
            <div class="card-body">

                <h5 class="card-title">{{ $user -> name }}</h5> <br>                
                <p class="card-text"><strong>Prenom :</strong> {{ $user -> name }}</p>
                <p class="card-text"><strong>Nom :</strong> {{ $user -> lastname }}</p>
                <p class="card-text"><strong>Anniversaire  :</strong> {{ $user -> birthday }}</p>
                <p class="card-text"><strong>Email :</strong> {{ $user -> email }}</p>
                <p class="card-text"><strong>Credits : {{ $user -> credits }}€</strong></p>

                <a href="{{ route('member.profil.edit', $user->id) }}"><button class="btn btn-primary">Editer votre profil</button></a>
                <a href="{{ route('member.profil.indexCredit', $user->id) }}"><button class="btn btn-primary">Ajouter des crédits</button></a>

            </div>
        </div>
    </div>
</div>

@endsection