<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RedeemReward as ResourcesRedeemReward;
use App\Http\Resources\RedeemRewardResource;
use App\Models\Gem;
use App\Models\RedeemReward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedeemRewardApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $redeemReward = new RedeemReward();
        $points = Gem::where('user_id', Auth::user()->id)->sum('points');
        // $finder =
            $redeemReward->name = $request->name;
        $redeemReward->finder = $request->finder;
        if ($points - $request->cost < 0) {
            return response()->json([
                "message" => "Error! Your gems aren't enough."
            ]);
        } else {
            $redeemReward->cost = $request->cost;
            $redeemReward->status = "redeemable";
            $redeemReward->user_id = Auth::user()->id;
            $redeemReward->reward_item_id = $request->reward_item_id;
            $redeemReward->restaurant_id = $request->restaurant_id;
            $redeemReward->save();
            return response()->json(['message' => 'Your reward is added. Visit us to redeem!']);
        }

       
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
    public function rewardBought()
    {
        $redeemRewards = RedeemReward::where('user_id', Auth::user()->id)->orderBy('status', 'asc')->get();
        // return RestaurantResource::collection($restaurants);
        return RedeemRewardResource::collection($redeemRewards);
    }
}
