<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;


class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request)
    {
        //check validation
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        //check validation
        if($request->password!=''){
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password',
            ]);
            $admin_data->password = Hash::make($request->password);
        }
        
        //check validation
        if($request->hasfile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            
            //remove admin photo
            unlink(public_path('uploads/'.$admin_data->photo));
       
            //add admmin photo
            $ext = $request->file('photo')->extension();
            $final_name = 'admin'.'.'.$ext;
 
            //move photo
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $admin_data->photo = $final_name;
             
        }

        // dd($admin_data);
        $admin_data->name = $request->name;
        $admin_data->email =$request->email;
        $admin_data->update();
        
        //return
        return redirect()->back()->with('success', 'Profile information is saved successfully');
        
    }
}
