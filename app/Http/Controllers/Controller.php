<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct(){
        if(Auth::check() || Auth::guard('admin')->check() || Auth::guard('comp')->check())
            $this->user_in = true;
        else
            $this->user_in = false;
    }

    public function getUserLvl($points){
        if($points < 1000)
            return 0;
        elseif($points >= 1000 && $points < 2000)
            return 1;
        elseif($points >= 2000 && $points < 3000)
            return 2;
        elseif($points >= 3000 && $points < 4000)
            return 3;
        elseif($points >= 4000 && $points < 5000)
            return 4;
        elseif($points >= 5000)
            return 5;
    }

    public function getAfterPercentDiscount($price, $discounts, $user_lvl, $echo_res = false){
        $dis = explode(',', $discounts);
        if($user_lvl == 0)
            $result = $price - (($dis[0] / 100) * $price);
        elseif($user_lvl == 1)
            $result = $price - (($dis[1] / 100) * $price);
        elseif($user_lvl == 2)
            $result = $price - (($dis[2] / 100) * $price);
        elseif($user_lvl == 3)
            $result = $price - (($dis[3] / 100) * $price);
        elseif($user_lvl == 4)
            $result = $price - (($dis[4] / 100) * $price);
        elseif($user_lvl == 5)
            $result = $price - (($dis[5] / 100) * $price);

        if($echo_res == true)
            echo $result;
        else
            return $result;
    }

    public function getAfterPointsDiscount($points, $points_discounts, $user_lvl, $echo_res = false){
        $dis = explode(',', $points_discounts);
        if($user_lvl == 0)
            $result = $points - $dis[0];
        elseif($user_lvl == 1)
            $result = $points - $dis[1];
        elseif($user_lvl == 2)
            $result = $points - $dis[2];
        elseif($user_lvl == 3)
            $result = $points - $dis[3];
        elseif($user_lvl == 4)
            $result = $points - $dis[4];
        elseif($user_lvl == 5)
            $result = $points - $dis[5];

        if($echo_res == true)
            echo $result;
        else
            return $result;
    }
    
    public function uploadImageCrop($data, $adds_for_name = '', $folder = "/uploads/images/")
    {
        $folder_with_public = public_path() . $folder;
        
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name = time() . $adds_for_name . '.jpg';
        $path = $folder_with_public . $image_name;

        file_put_contents($path, $data);

        return (object) [
            "success" => true,
            "image_name" => $folder . $image_name
        ];
    }
}
