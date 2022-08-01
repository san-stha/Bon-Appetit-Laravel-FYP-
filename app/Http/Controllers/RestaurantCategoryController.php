<?php

namespace App\Http\Controllers;

use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RestaurantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantCategories = RestaurantCategory::all();
        return view('restaurantCategory.index', compact('restaurantCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurantCategories = RestaurantCategory::all();
        return view('restaurantCategory.create', compact('restaurantCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurantCategory = new RestaurantCategory();
        $restaurantCategory->name = $request->name;
        // $restaurantCategory->price = $request->price;
        // $restaurantCategory->description = $request->description;
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
            $fileName->move('images/categoryRestaurant/', $newName);
            $restaurantCategory->image = 'images/categoryRestaurant/' . $newName;
        }
        $restaurantCategory->save();
        // Alert::success("Restaurant Categories Added");
        toast("Restaurant Categories Added", "success");
        return redirect('/restaurantCategory');
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
        $restaurantCategories = RestaurantCategory::find($id);
        return view('restaurantCategory.edit', compact('restaurantCategories'));
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
        $restaurantCategory = RestaurantCategory::find($id);
        $restaurantCategory->name = $request->name;
        // $restaurantCategory->price = $request->price;
        // $restaurantCategory->description = $request->description;
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
            $fileName->move('images/categoryRestaurant/', $newName);
            $restaurantCategory->image = 'images/categoryRestaurant/' . $newName;
        }
        $restaurantCategory->update();

        return redirect('/restaurantCategory')->with('message', 'Food Categories added succesfully');
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
