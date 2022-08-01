<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RatingsResoutce;
use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ratings = Ratings::orderBy('rating', 'desc')->selectRaw('avg(value) as rating,restaurant_id')->groupBy('restaurant_id')->get();
        return RatingsResoutce::collection($ratings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ratings = new Ratings();
        $ratings->value = $request->value;
        $ratings->review = $request->review;
        $ratings->user_id = Auth::user()->id;
        $ratings->restaurant_id = $request->restaurant_id;
        $ratings->save();
        return response()->json(['message' => 'Your ratings is submited']);
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
    public function averageRating($id)
    {
        $totalRatings = Ratings::where('restaurant_id', $id)->sum('value');
        $totalUsers = Ratings::where('restaurant_id', $id)->count('user_id');
        $reviews = Ratings::where('restaurant_id', $id)->select('user_id', 'review')->get();
        if ($totalRatings > 0) {
            $averageRating = $totalRatings / $totalUsers;
        } elseif ($totalRatings <= 0) {
            $averageRating = 0;
        }
        return response()->json(['averageRating' => $averageRating, 'totalUsers' => $totalUsers, 'reviews' => $reviews]);
    }

    public function ratedRestaurants()
    {
        $ratings = Ratings::orderBy('rating', 'desc')->selectRaw('avg(value) as rating,product_id')->groupBy('product_id')->get();
        return RatingsResoutce::collection($ratings);
    }

    public function topFiveRestaurants()
    {
        //
        $topFiveRes = Ratings::orderBy('rating', 'desc')->selectRaw('avg(value) as rating,restaurant_id')->groupBy('restaurant_id')->limit(5)->get();
        // $allRatedRes = Ratings::orderBy('rating', 'desc')->selectRaw('avg(value) as rating,restaurant_id')->groupBy('restaurant_id')->get();
        // if (count($topFiveRes) >= 5) {
        //     # code...
        //     // return "none";
            
        //     return RatingsResoutce::collection($topFiveRes);

        // } else if(count($topFiveRes) <= 5 or count($topFiveRes) > 0){
        //     # code...
        //     // return "none";

        //     return RatingsResoutce::collection($allRatedRes);
        // } else{
        //     return "none";
        // }

        // return $topFiveRes[0]->restaurant;
        return RatingsResoutce::collection($topFiveRes);
    }
}
