@extends('layouts.expert')
@section('content')

  <div class="container mt-3">
    <div class="container text-center mt-3 mb-3"><h2>View Gestion des Experts</h2></div>

      <div class="card mb-5">
        <div class="card-header">
          <h5><strong>View data</strong></h5>
        </div>
        <div class="card-body">

          <form action="{{ route('users.show',$user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="container form-row" style="padding: 10px">
              <div class=" col-2 text-left"><strong>ID:</strong></div>
              <div class="mb-2 col-8"><h6>{{ $user->id }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
                <div class="col-2 text-left"><strong>Username:</strong></div>
                <div class="mb-2 col-8"><h6>{{ $user->username }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
                <div class="col-2 text-left"><strong>Forename:</strong></div>
                <div class="mb-2 col-8"><h6>{{ $user->forename }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
              <div class="col-2 text-left"><strong>Lastname:</strong></div>
              <div class="mb-2 col-8"><h6>{{ $user->lastname }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
              <div class=" col-2 text-left"><strong>Email:</strong></div>
              <div class="mb-2 col-8"><h6>{{ $user->email }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
              <div class="col-2 text-left"><strong>User type:</strong></div>
              <div class="mb-2 col-8"><h6>{{ $user->user_type }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
                <div class=" col-2 text-left"><strong>Phone number:</strong></div>
                <div class="mb-2 col-8"><h6>{{ $user->phone_number }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
                <div class="col-2 text-left"><strong>Professional address:</strong></div>
                <div class="mb-2 col-8"><h6>{{ $user->professional_address }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
                <div class=" col-2 text-left"><strong>Rpps number:</strong></div>
                <div class="mb-2 col-8"><h6>{{ $user->rpps_number }}</h6></div>
            </div>

            <div class="container form-row" style="padding: 10px">
                <div class="col-2 text-left"><strong>Status:</strong></div>
                <div class="mb-2 col-8"><h6>{{ $user->status }}</h6></div>
            </div>

            <div class="text-center mt-4">
              <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>

          </form>

        </div>
      </div>
    </div>



  @endsection
