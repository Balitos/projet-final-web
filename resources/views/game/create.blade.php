@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add new game</div>
            <div class="card-body">
                <form action=" {{ route('game.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nom">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                      </div>
                      <div class="form-group">
                        <label for="quantity">Quantité</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantité">
                      </div>
                      <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Prix">
                      </div>
                      <div class="form-group">
                        <label for="activationCode">Code d'activation</label>
                        <input type="text" class="form-control" name="activationCode" id="activationCode" placeholder="Code d'activation">
                      </div>
                      <div class="form-group">
                        <label for="platform">Plateform</label>
                        <select id="Select" name="platform" class="form-control">
                            <option>PC</option>
                            <option>PS4</option>
                            <option>PS5</option>
                            <option>XBOXONE</option>
                        </select>
                      </div>
                      <div class="form-group">
                            <label for="image">Image</label>
                            <br>
                            <input type="file" name="image">
                      </div>
                <button type="submit" class="btn btn-primary">Add new game</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
