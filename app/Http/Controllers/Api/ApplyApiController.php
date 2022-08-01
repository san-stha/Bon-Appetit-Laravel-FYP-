<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplyResource;
use App\Models\Apply;
use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applies = Apply::all();
        return response()->json($applies);
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

    public function visitedRestaurants()
    {

        $rated = Ratings::where('user_id', Auth::user()->id)->select('restaurant_id')->distinct('restaurant_id')->get();
        $already = $rated->pluck('restaurant_id');
        // return $already;
        $applies = Apply::where('user_id', Auth::user()->id)->select("user_id", "restaurant_id")->distinct('restaurant_id')->whereNotIn('restaurant_id', $already)->get();
        return ApplyResource::collection($applies);
    }
}
