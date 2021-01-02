@extends('layouts.expert')
@section('content')

<div class="container mt-3">
    <div class="container text-center mt-3 mb-3"><h2>Create new Experts</h2></div>
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">New user</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.index') }}">
                        @csrf

                        <div class="container form-row" style="padding: 10px">
                            <div class="col-2 text-left"><strong>Username:</strong></div>
                            <input type="text" name="username"  class="form-control col-4" placeholder="Enter username">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                            <div class="col-2 text-left"><strong>User type:</strong></div>
                            <input type="text" name="user_type"  class="form-control col-4" placeholder="Enter user type">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                            <div class="col-2 text-left"><strong>Forename:</strong></div>
                            <input type="text" name="forename"  class="form-control col-4" placeholder="Enter forename">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                          <div class="col-2 text-left"><strong>Lastname:</strong></div>
                          <input type="text" name="lastname"  class="form-control col-4" placeholder="Enter surname">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                          <div class=" col-2 text-left"><strong>Email:</strong></div>
                          <input type="text" name="email"  class="form-control col-4" placeholder="Enter email address ">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                            <div class=" col-2 text-left"><strong>Phone number:</strong></div>
                            <input type="text" name="phone_number"  class="form-control col-4" placeholder="Enter phone_number ">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                            <div class=" col-2 text-left"><strong>Professional address:</strong></div>
                            <input type="text" name="professional_address" class="form-control col-4" placeholder="Enter Professional address ">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                            <div class=" col-2 text-left"><strong>Status:</strong></div>
                            <input type="text" name="status" class="form-control col-4" placeholder="Enter status ">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                            <div class=" col-2 text-left"><strong>Rpps numbers:</strong></div>
                            <input type="text" name="rpps_number"  class="form-control col-4" placeholder="Enter rpps number">
                        </div>

                        <div class="container form-row" style="padding: 10px">
                            <div class=" col-2 text-left"><strong>Password:</strong></div>
                            <input type="text" name="password"  class="form-control col-4" placeholder="Enter password">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




  @endsection
