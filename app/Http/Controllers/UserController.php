<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{



    public function updateUser(Request $request, $id){
        $user=User::findOrFail($id);
        $this->validate($request,[
            'username' => 'required|string|max:191|unique:users,username,'.$user->id,
            'forename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'rpps_number' => 'required|numeric|min:13|unique:users,rpps_number,'.$user->id,
            'phone_number' => 'required|numeric|unique:users,phone_number,'.$user->id
        ]);

        $user->update($request->all());
    }
    public function destroy(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->status ='Deleted';
        $user->save();
    }


    public function approve(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->status ='Registred';
        $user->save();
    }
    public function validated(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->status ='Validated';
        $user->save();
    }
    public function inactivated(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->status ='InActivated';
        $user->save();
    }




    public function index(Request $request)
    {
        $s = $request->input('s');

        $users = User::where('user_type', 'PhD')
                ->paginate(5);

        return view('users.index',compact('users', 's'))->with('i',(request()->input('page',1)-1)*5);

    }


    public function create()
    {
        return view('users.create');
    }



    public function store(Request $request)
    {

        $request->validate([
            'username',
            'forename',
            'lastname',
            'email',
            'user_type',
            'phone_number',
            'professional_address',
            'rpps_number',
            'password',
            'status'
        ]);

          User::create($request->all());

          return redirect()->route('users.index')->with('success','User created successfully.');
    }


    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(  $id)
    {
        $user  = User::where('id',  $id )
            ->first();
        return view('users.edit',compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'username',
            'forename',
            'lastname',
            'email',
            'user_type',
            'phone_number',
            'professional_address',
            'rpps_number',
            'password'
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success','User updated successfully');
    }


    public function remove(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success');
    }
    public function verifyUser($username)
    {
       return DB::table('users')->where('username', $username)->get();
    }

}
