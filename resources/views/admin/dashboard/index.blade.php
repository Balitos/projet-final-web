@extends('layouts.app')

@section('content')
<div class="card-body">
    <ul class="list-group">
        <li class="list-group-item">Nombre de membres : <strong>{{ $userCount }}</strong></li>
        <li class="list-group-item">Nombre de jeux : <strong>{{ $gameCount }}</strong></li>
        <li class="list-group-item">Nombre de membres : <strong>{{ $userCount }} membres</strong></li>
        <li class="list-group-item">Nombre de jeux : <strong>{{ $gameCount }} jeux</strong></li>
        <li class="list-group-item">Nombre de ventes : <strong>{{ $sellCount }} ventes</strong></li>
        <li class="list-group-item">Les revenus du site totaux :<strong> {{ $totalSales }} €</strong> </li>
    </ul>
</div>
@endsection