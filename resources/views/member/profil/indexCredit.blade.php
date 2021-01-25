@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{ route('member.profil.updateCredit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Credits</label>
            <input type="number" name="credits" class="form-control" value="{{ auth()->user()->credits }}">
        

        <button type="submit" class="btn btn-primary">Ajouter vos crédits</button>
    </form>
    <a class="btn btn-danger" href="{{ route('member.profil.index')}}" role="button">Retour</a>
    </div>
</div>
@endsection