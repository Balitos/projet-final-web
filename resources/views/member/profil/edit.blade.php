@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Editer votre Profil</div>
              <div class="card-body">
                  <form action="{{ route('member.profil.update', auth()->user()) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <label for="name">Nom</label>
                          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom" value="{{ $user->lastname }}">
                        </div>
                        <div class="form-group">
                          <label for="description">Prénom</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Prenom" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                          <label for="quantity">Adresse mail</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                          <label for="price">Date de naissance</label>
                          <input type="date" class="form-control" name="date" id="date" placeholder="Date" value="{{ $user->birthday }}">
                        </div>
                  <button type="submit" class="btn btn-primary">Editer le profil</button>
                  </form>
              </div>
          
              
            </div>
        </div>
    </div>
</div>
@endsection
