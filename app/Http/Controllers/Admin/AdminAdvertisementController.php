<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\TopAdvertisement;

class AdminAdvertisementController extends Controller
{
    public function home_ad_show()
    {
        $home_ad_data = HomeAdvertisement::where('id',1)->first();
        return view('admin.advertisement_home_view', compact('home_ad_data'));
    }

    public function home_ad_update(Request $request)
    {
        $home_ad_data = HomeAdvertisement::where('id',1)->first();

        //check validation
        if($request->hasfile('above_search_ad')){
            $request->validate([
                'above_search_ad' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            
            //remove photo path
            unlink(public_path('uploads/'. $home_ad_data->above_search_ad));
       
            //add  photo
            $ext = $request->file('above_search_ad')->extension();
            $final_name = 'above_search_ad'.'.'.$ext;
 
            //move photo
            $request->file('above_search_ad')->move(public_path('uploads/'),$final_name);
            $home_ad_data->above_search_ad = $final_name;
             
        }

        if($request->hasfile('above_footer_ad')){
            $request->validate([
                'above_footer_ad' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            
            //remove photo path
            unlink(public_path('uploads/'. $home_ad_data->above_footer_ad));
       
            //add  photo
            $ext = $request->file('above_footer_ad')->extension();
            $final_name = 'above_footer_ad'.'.'.$ext;
 
            //move photo
            $request->file('above_footer_ad')->move(public_path('uploads/'),$final_name);
            $home_ad_data->above_footer_ad = $final_name;
             
        }

        

        $home_ad_data->above_search_url = $request->above_search_url;
        $home_ad_data->above_search_status = $request->above_search_status;
        $home_ad_data->above_footer_url = $request->above_footer_url;
        $home_ad_data->above_footer_status = $request->above_footer_status;
        $home_ad_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully');
    }

    public function top_ad_show()
    {
        $top_ad_data = TopAdvertisement::where('id',1)->first();
        return view('admin.advertisement_top_view', compact('top_ad_data'));
    }


    public function top_ad_update(Request $request)
    {
        $top_ad_data = TopAdvertisement::where('id',1)->first();

        //check validation
        if($request->hasfile('top_ad_img')){
            $request->validate([
                'top_ad_img' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            
            //remove photo path
            unlink(public_path('uploads/'. $top_ad_data->top_ad_img));
            
            //add  photo
            $ext = $request->file('top_ad_img')->extension();
            $final_name = 'top_ad_img'.'.'.$ext;
 
            //move photo
            $request->file('top_ad_img')->move(public_path('uploads/'),$final_name);
            $top_ad_data->top_ad_img = $final_name;
             
        }
        
        $top_ad_data->top_ad_url = $request->top_ad_url;
        $top_ad_data->top_ad_status = $request->top_ad_status;
        $top_ad_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully');
    }


}
