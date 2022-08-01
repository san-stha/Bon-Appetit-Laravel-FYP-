<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCategoryResource;
use App\Http\Resources\RestaurantResource;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $restaurants = Restaurant::all();
        // return RestaurantResource::collection($restaurants);
        return RestaurantResource::collection($restaurants);
        // return response()->json($restaurants);
    }

    public function latLongRes()
    {
        $restaurants = Restaurant::all();
        return RestaurantResource::collection($restaurants);
    }

    // public function distance($longitudeFrom, $latitudeFrom){
    //     $restaurants = Restaurant::all();

        
        
    //     $theta    = $longitudeFrom - $longitudeTo;
    //     $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    //     $dist    = acos($dist);
    //     $dist    = rad2deg($dist);
    //     $miles    = $dist * 60 * 1.1515;
    // }

    // public function distance($lng, $lat) {
    //     $sqlDistance = DB::raw('( 111.045 * acos( cos( radians(' . $lat . ') ) 
    //    * cos( radians( addresses.latitude ) ) 
    //    * cos( radians( addresses.longitude ) 
    //    - radians(' . $lng . ') ) 
    //    + sin( radians(' . $lat . ') ) 
    //    * sin( radians( addresses.latitude ) ) ) )');
    // }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodCategories = FoodCategory::where('user_id', $id)->get();
        return FoodCategoryResource::collection($foodCategories);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toRateRestaurants($id)
    {
        $rateRes = Restaurant::where("user_id", $id)->get();
        // return $rateRes;
        return RestaurantResource::collection($rateRes);
    }

    public function binarySearchRestaurant($searchWord)
    {
        $containsDuplicates = true;
        $res = Restaurant::orderBy('name', 'asc')->select('name')->get();
        $resCollection = RestaurantResource::collection($res);
        $restaurants = $resCollection->pluck('name');
        $haystack = $restaurants;
        // return $restaurants;
        $compare = 'strcmp';
        $high = count($restaurants) - 1;
        $low = 0;
        $needle = $searchWord;
        $key = false;
        while ($high >= $low) {
            $mid = (int)floor(($high + $low) / 2);
           
            $cmp = call_user_func($compare, $needle, $haystack[$mid]);
            if ($cmp < 0) {
                $high = $mid - 1;

            } elseif ($cmp > 0) {
                $low = $mid + 1;
            } else {
                if ($containsDuplicates) {
                    while ($mid > 0 && call_user_func($compare, $haystack[($mid - 1)], $haystack[$mid]) === 0) {
                        $mid--;
                    }
                }
                $key = $mid;
                // return $mid;
                break;
            }
        }

        if ($key > 0) {
            print($key);
            return "ohgh";

            $result = Restaurant::where('name', $needle)->get();
            return RestaurantResource::collection($result);
        } elseif ($key == 0 && strcmp($needle, $haystack[0]) == 0) {
            $result = Restaurant::where('name', $needle)->get();
            return RestaurantResource::collection($result);

        }

        else { 
            $sm_needle = substr($needle, 0, 1);
            $result = Restaurant::where('name', 'LIKE', $sm_needle . '%')->get();
            return RestaurantResource::collection($result);

        }
        return $key;
    }

    public function latLongList()
    {
        $restaurants = Restaurant::all();
        return response()->json($restaurants);
    }

    public function resDetail($id)
    {
        $resDetail = Restaurant::where('user_id', $id)->get();
        return RestaurantResource::collection($resDetail);
    }

    // function binarySearch($a)
    // {
    //     // $arr = Restaurant::orderBy('name', 'desc')->select('name')->get();
    //     $arr = array("asc", "bsc", "csc", "dsc");
    //     $l = 0;
    //     $r = count($arr);
    //     // print $arr;
    //     // return $arr;
    //     // $x = "{" . $a . "}";
    //     // $x = response()->json([$arr]);
    //     // print($x. "thos is sadaijkdsal");
    //     // $x = 'ide';
    //     $a = "eee";
    //     $x = $a;
    //     // print($r);
    //     while ($l <= $r) {
    //         $m = $l + (int)(($r - $l) / 2);
    //         // print('m');
    //         // print($m);
    //         // print("x");
    //         // print($x);
    //         // print("arara");
    //         // print($arr[$m]);
    //         $res = strcmp($x, $arr[$m]);
    //         // print('res');

    //         // print($res);
    //         // Check if x is present at mid
    //         if ($res == 0)
    //             print($m);
    //             return ($m - 1 . "dsds");

    //         // If x greater, ignore left half
    //         if ($res > 0)
    //             $l = $m + 1;

    //         // If x is smaller, ignore right half
    //         else
    //             $r = $m - 1;
    //         // print('tttt');
    //         // print($l);
    //     }
    //     // print('retun hp');
    //     return -1;
    // }
}
