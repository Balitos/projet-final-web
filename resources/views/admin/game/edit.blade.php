@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Editer le jeu</div>
            <div class="card-body">
                <form action=" {{ route('game.update', $game) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="{{ $game->name }}">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ $game->description }}">
                      </div>
                      <div class="form-group">
                        <label for="quantity">Quantité</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantité" value="{{ $game->quantity }}">
                      </div>
                      <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Prix" value="{{ $game->price }}">
                      </div>
                      <div class="form-group">
                        <label for="activationCode">Code d'activation</label>
                        <input type="text" class="form-control" name="activationCode" id="activationCode" placeholder="Code d'activation" value="{{ $game->activationCode }}">
                      </div>
                      <div class="form-group">
                        <label for="platform">Plateform</label>
                        <select id="Select" name="platform" class="form-control" value="{{ $game->platform }}">
                            <option>PC</option>
                            <option>PS4</option>
                            <option>PS5</option>
                            <option>XBOXONE</option>
                        </select>
                      </div>
                      <div class="form-group">
                            <label for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                      </div>
                <button type="submit" class="btn btn-primary">Editer le jeu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
