<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  string  $userType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showRegisterForm($userType)
    {
        return view('home.register')->with(['userType' => $userType]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function choseUser()
    {
        return view('home.chose_user');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addUser(Request $request, $userType)
    {
        $this->validateLogin($request);
        $pictureName = null;
        if($request->hasFile('picture'))
        {
            $currentTimestamp = Carbon::now()->timestamp;
            $pictureName = $currentTimestamp.$request->picture->getClientOriginalName();
            $request->file('picture')->storeAs('pictures', $pictureName);
        }
        $user = new User();
        $user->username = $request->username;
        $user->forename = $request->forename;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rpps_number = $request->rpps_number;
        $user->phone_number = $request->phone_number;
        $user->user_type = $userType;
        $user->hpc_picture = "2s";
        $user->picture =  $pictureName;
        $user->status = 'in registration';
        $user->save();
        return view('home.logged')->with(['userType' => $userType]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'forename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'rpps_number' => ['required', 'numeric', 'min:13', 'unique:users'],
            'phone_number' => ['required', 'numeric', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'pictureName' => ['mimes:jpeg,jpg,png'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

}
