<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $foods = Food::where('user_id', Auth::user()->id)->get();
        $foods = Food::all();
        return response()->json($foods);
        // return $foods;
    }

    public function getIncBubbleSortingFood($id)
    {
        $unsortedFoods = Food::where('food_category_id', $id)->select('price', 'id', 'name', 'description', 'image', 'food_category_id', 'user_id', 'created_at', 'updated_at')->get();
        $foods_array = $unsortedFoods;
        do {
            $place_swapped = false;
            for ($i = 0, $cnt = count($foods_array) - 1; $i < $cnt; $i++) {
                if ($foods_array[$i] > $foods_array[$i + 1]) {
                    list($foods_array[$i + 1], $foods_array[$i]) =
                        array($foods_array[$i], $foods_array[$i + 1]);
                    $place_swapped = true;
                }
            }
        } while ($place_swapped);
        // return $foods_array;
        return FoodResource::collection($foods_array);
    }

    // public function getDecBubbleSortingFood()
    // {
    //     $unsortedFoods = Food::select('price', 'id', 'name', 'description', 'image', 'food_category_id', 'user_id', 'created_at', 'updated_at')->get();
    //     $my_array = $unsortedFoods;
    //     do {
    //         $swapped = false;
    //         for ($i = 0, $c = count($my_array) - 1; $i < $c; $i++) {
    //             if ($my_array[$i] < $my_array[$i + 1]) {
    //                 list($my_array[$i + 1], $my_array[$i]) =
    //                     array($my_array[$i], $my_array[$i + 1]);
    //                 $swapped = true;
    //             }
    //         }
    //     } while ($swapped);
    //     // return $my_array;
    //     return FoodResource::collection($my_array);
    // }

    public function getDecBubbleSortingFood($id)
    {
        $unsortedFoods = Food::where('food_category_id', $id)->select('price', 'id', 'name', 'description', 'image', 'food_category_id', 'user_id', 'created_at', 'updated_at')->get();
        $foods_array = $unsortedFoods;
        do {
            $place_swapped = false;
            for ($i = 0, $cnt = count($foods_array) - 1; $i < $cnt; $i++) {
                if ($foods_array[$i] < $foods_array[$i + 1]) {
                    list($foods_array[$i + 1], $foods_array[$i]) =
                        array($foods_array[$i], $foods_array[$i + 1]);
                    $place_swapped = true;
                }
            }
        } while ($place_swapped);
        // return $foods_array;
        return FoodResource::collection($foods_array);
    }



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
        //
        $foods = Food::where('id', $id)->get();
        return FoodResource::collection($foods);
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
}
