<?php

namespace App\Http\Controllers;

use App\Models\RewardItem;
use Illuminate\Http\Request;

class RewardItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rewardItems = RewardItem::all();
        return view('rewardItem.index', compact('rewardItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rewardItems = RewardItem::all();
        return view('rewardItem.create', compact('rewardItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rewardItem = new RewardItem();
        $rewardItem->name = $request->name;
        $rewardItem->finder = $request->finder;
        $rewardItem->cost = $request->cost;
        if ($request->hasFile('image')) {
            $fileName = $request->image;
            $newName = time() . $fileName->getClientOriginalName();
            // $image_resize = Image::make($image->getRealPath());
            //     $image_resize->resize(600,600,
            //         function($constraint){
            //             $constraint->aspectRatio();
            //             $constraint->upsize();
            //         }
            //     );
            $fileName->move('images/itemReward/', $newName);
            $rewardItem->image = 'images/itemReward/' . $newName;
        }

        // $rewardItem->price = $request->price;
        // $rewardItem->description = $request->description;
        $rewardItem->save();
        toast("Reward Items Added", "success");

        return redirect('/rewardItem');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rewardItems = RewardItem::find($id);
        return view('rewardItem.edit', compact('rewardItems'));
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
        $rewardItem = RewardItem::find($id);
        $rewardItem->name = $request->name;
        $rewardItem->finder = $request->finder;
        $rewardItem->cost = $request->cost;

        // $rewardItem->price = $request->price;
        // $rewardItem->description = $request->description;

        $rewardItem->update();

        toast("Reward Items Added", "success");
        return redirect('/rewardItem');
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
