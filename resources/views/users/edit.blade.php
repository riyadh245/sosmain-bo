@extends('layouts.expert')
@section('content')

  <div class="container mt-3">
    <div class="container text-center mt-3 mb-3"><h2>Edit Gestion des Experts</h2></div>

      <div class="card mb-5">
        <div class="card-header">
          <h5><strong>Edit data</strong></h5>
        </div>
        <div class="card-body">

          <form action="{{ route('users.update',$user ) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="container form-row" style="padding: 10px">
                <div class="col-2 text-left"><strong>Username:</strong></div>
                <input type="text" name="username" value="{{ $user->username }}" class="form-control col-4" placeholder="Enter username">
            </div>

            <div class="container form-row" style="padding: 10px">
                <div class="col-2 text-left"><strong>Forename:</strong></div>
                <input type="text" name="forename" value="{{ $user->forename }}" class="form-control col-4" placeholder="Enter forename">
            </div>

            <div class="container form-row" style="padding: 10px">
              <div class="col-2 text-left"><strong>Lastname:</strong></div>
              <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control col-4" placeholder="Enter surname">
            </div>

            <div class="container form-row" style="padding: 10px">
              <div class=" col-2 text-left"><strong>Email:</strong></div>
              <input type="text" name="email" value="{{ $user->email }}" class="form-control col-4" placeholder="Enter email address ">
            </div>

            <div class="container form-row" style="padding: 10px">
                <div class="col-2 text-left"><strong>User type:</strong></div>
                <input type="text" name="user_type" value="{{ $user->user_type }}" class="form-control col-4" placeholder="Enter user type">
            </div>

              <div class="container form-row" style="padding: 10px">
                <div class=" col-2 text-left"><strong>Phone number:</strong></div>
                <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control col-4" placeholder="Enter phone_number ">
              </div>

              <div class="container form-row" style="padding: 10px">
                <div class=" col-2 text-left"><strong>Professional address:</strong></div>
                <input type="text" name="professional_address" value="{{ $user->professional_address }}" class="form-control col-4" placeholder="Enter Professional address ">
              </div>

              <div class="container form-row" style="padding: 10px">
                <div class=" col-2 text-left"><strong>Rpps numbers:</strong></div>
                <input type="text" name="rpps_number" value="{{ $user->rpps_number }}" class="form-control col-4" placeholder="Enter rpps number">
              </div>

              <div class="container form-row" style="padding: 10px">
                <div class=" col-2 text-left"><strong>Password:</strong></div>
                <input type="text" name="password" value="{{ $user->password }}" class="form-control col-4" placeholder="Enter password">
              </div>


            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>

          </form>

        </div>
      </div>
    </div>




  @endsection
