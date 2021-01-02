 @extends('layouts.expert')
 @section('content')
   <div class="container text-center mt-5 mb-5"><h1><strong>Gestion des Experts</strong></h1></div>
        <div class="row text-center container text-center">

            <div class="col-4">
                <a class="btn btn-primary mb-3" href="{{ route('users.create') }}">Add new Experts</a>
            </div>
            <div class="col-4">

            </div>
            <div class="col-4">
                <form class="form-inline my-2 my-lg-0 text-right" method="GET" action="{{ route('users.index')}}">
                    <input type="text" class="form-control" name="s" placeholder="Search for users" value=""> <span class="input-group-btn ml-2">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message }}
          </div>
        @endif


        <table class="table table-striped pl-2 pr-2">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Forename</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">User Type</th>
                <th scope="col">Phone number</th>
                <th scope="col">Actions</th>
              </tr>
              @foreach ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->forename }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->user_type }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-success mr-1" href="{{ route('users.show',$user->id) }}">View</a>
                            <a class="btn btn-primary mr-1" href="{{ route('users.edit',$user) }}">Edit</a>
                            <form action="{{ route('users.deleted',$user) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
               @endforeach
            </tbody>
          </table>
          {!! $users->appends(['s' => $s])->links() !!}



 @endsection




