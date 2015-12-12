<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GeneaLabs\Phpgmaps\Phpgmaps as Gmaps;
use App\Crops;

class HomeController extends Controller
{
    public function index()
    {

        $marker = array();
            # show map google
        $config = array();
        $config['center'] = 'auto';
        $gmaps = new Gmaps;
        $gmaps->initialize($config);
        // set up the marker ready for positioning
        // once we know the users location
        if(Auth::guest()){
          $maps_crops = Crops::all();
        }else{
          if(Auth::user()->typeuser_id=='2'){
            $maps_crops = Crops::all();
          }else{
            $maps_crops = DB::table('group_crop_users')
            ->join('crops','group_crop_users.crop_id','=','crops.crop_id')
            ->where('group_crop_users.user_id','=',Auth::user()->id)->get();
          }
        }
        foreach ($maps_crops as $map) {
            // Loop Create Map
            $marker['map_id'] = $map->crop_id;
            $marker['position'] = $map->crop_latitude.','.$map->crop_longitude;
            $marker['title'] = 'mapid_'.$map->crop_id;
            $marker['icon'] = 'assets/img/crops/rice/rice_running.png';
            $gmaps->add_marker($marker);
        }
        $map = $gmaps->create_map();
        return view('home',compact('map'));
    }
}
