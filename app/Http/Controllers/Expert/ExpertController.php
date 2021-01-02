<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertController extends Controller
{
    //
    public function showAllExperts()
    {
        return view('admin.management.expert');
    }

    public function getAllExperts($pagination)
    {
        return User::where('user_type', 'expert')->paginate($pagination);
        
    }

    
    public function getNumberExpert( )
    {
        return User::where('user_type', 'expert')->count();
       
    }
}
