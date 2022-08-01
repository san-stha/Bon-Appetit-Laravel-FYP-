<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GemsResource;
use App\Models\Gem;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Gem::where('user_id', Auth::user()->id)->sum('points');
        return response()->json(['points' => $points]);
    }

    public function allUsersGems()
    {
        $points = Gem::all();
        return response()->json(['points' => $points]);
    }

    public function userGemHistory()
    {
        $points = Gem::where('user_id', Auth::user()->id)->get();
        // return response()->json(['points'=>$points]);
        return GemsResource::collection($points);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gems = new Gem();
        $gems->user_id = $request->user_id;
        $gems->restaurant_id = Auth::user()->id;
        $gems->points = $request->points;
        $gems->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $points = Gem::where('user_id', $id)->get();
        // return response()->json(['points'=>$points]);
        return GemsResource::collection($points);
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

    public function reduceUsergem(Request $request)
    {
        $points = Gem::where('user_id', Auth::user()->id)->sum('points');

        if ($points - $request->cost <= 0) {
            return response()->json(
                [
                    "message" => "Gem points unchanged."
                ]
            );
        } else {
            $gems = new Gem();
            $gems->user_id = Auth::user()->id;

            // make this nullable
            $gems->restaurant_id = 3;
            $posPoint = $request->points;
            $negPoint = -$posPoint;
            $gems->points = $negPoint;
            $gems->save();
            return response()->json(['message' => 'Gems deducted']);

        }
    }
}
