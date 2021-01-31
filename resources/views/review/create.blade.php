@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Ajouter un avis</div>
            <div class="card-body">
                <form action=" {{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" name="titre" id="titre" placeholder="Nom">
                      </div>
                      <div class="form-group">
                        <label for="contenu">Ecrivez votre retour :</label>
                        <input type="text" class="form-control" name="contenu" id="contenu" placeholder="Contenu">
                      </div>
                      <div class="form-group">
                        <label for="note">Note</label>
                        <select id="Select" name="note" class="form-control">
                            <option>5</option>
                            <option>4</option>
                            <option>3</option>
                            <option>2</option>
                            <option>1</option>
                        </select>
                      </div>
                <button type="submit" class="btn btn-primary">Ajoutez un avis</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
