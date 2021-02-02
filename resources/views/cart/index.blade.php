@extends('layouts.app')

@section('content')

<div class="px-4 px-lg-0">
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
  
            <!-- Shopping cart table -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">JEU</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">PRIX</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">SUPPRIMER</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                @foreach(Cart::content() as $game)    
                  <tr>
                    <th scope="row">
                      <div class="p-2">
                        <img src="{{ asset('storage/image/' . $game->model->image) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> {{$game->model->name}}</h5>
                        </div>
                      </div>
                      <td class="align-middle"><strong>{{ $game->model->price}} €</strong></td>
                      <td class="align-middle">
                        <form action="{{ route('cart.destroy', $game->rowId)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="text-dark"><i class="fa fa-trash"></i></button>
                        </form>  

                      </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- End -->
          </div>
        </div>

          <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
            <div class="p-4">
              <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom" style="color: white"><strong>Total</strong>
                  <h5 class="font-weight-bold" style="color: white">{{ Cart::Subtotal()}} €</h5>
                </li>
                <form action=" {{ route('member.profil.buyGame') }}" method="GET" enctype="multipart/form-data">
                  @csrf
                  <button type="submit" class="btn btn-success rounded-pill py-2 btn-block">Acheter maintenant</button>
              </form>
              </ul>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </div>

@endsection