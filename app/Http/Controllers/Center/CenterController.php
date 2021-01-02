<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    //
    public function showAllCenters()
    {
        return view('admin.management.center');
    }
    public function showAllCentersExpert()
    {
        return view('expert.admin.management.centre_management_expert');
    }
    

    public function getAllCenters( $pagination)
    {
        return DB::table('centers')->paginate($pagination);
        
    }
    public function getNumberCenters( )
    {
        return DB::table('centers')->count();
       
    }

    public function updateCenter(Request $request, $id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        $center=Center::findOrFail($id);
        $center->update($request->all());
    }
    public function deleteCenter(Request $request, $id)
    {
        DB::table('centers')->where('id', '=', $id)->delete();
    }

    public function addCenter(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        return  Center::create([
            'title' => $request['title'],
            'website' => $request['website'],
            'address' => $request['address'],
            'longitude'=>$request['longitude'],
            'latitude'=>$request['latitude'],
        ]);
    }
}
