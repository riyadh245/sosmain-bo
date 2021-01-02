@extends('layouts.app')

@section('content')


<h1> Vous etes ...</h1>
@if (Route::has('login'))
@auth
@else
@if (Route::has('register'))


<div id="images">
  <a href="{{ url('/register_m') }}">
      <img src=" {{ asset('/img/Medecinpng.jpg')}}" width="250px" height="250px">
      <div class="caption">Urgentiste Medecin Généraliste </div>
  </a>
  <a href="{{ url('/register_e') }}">
      <img src=" {{ asset('/img/chirurgien.png')}}" mar width="250px" height="250px"> 
      <div class="caption">Chirurgien de la main</div>
  </a>
</div>
@endif
@endauth
@endif
                
           




@endsection
