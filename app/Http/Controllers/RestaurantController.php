<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurants = Restaurant::find($id);
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        return view('restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        $restaurantCategories = RestaurantCategory::all();
        return view('restaurant.create', compact('restaurants', 'restaurantCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Auth::user()->id 
        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->phone_number = $request->phone_number;
        $restaurant->description = $request->description;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->restaurant_category_id = $request->restaurant_category_id;
        $restaurant->user_id = Auth::user()->id;


        if($request->hasFile('image')){
            $fileName = $request->image;
            $newName = time().$fileName->getClientOriginalName();
            // $image_resize = Image::make($image->getRealPath());
            //     $image_resize->resize(600,600,
            //         function($constraint){
            //             $constraint->aspectRatio();
            //             $constraint->upsize();
            //         }
            //     );
            $fileName->move('images/restaurant/', $newName);
            $restaurant->image = 'images/restaurant/'.$newName;
        }

        // if($request->hasFile('image')){
        //     if($restaurant->image){
        //         @unlink($restaurant->image);
        //     }
        //     $fileName = $request->image;
        //     $newName = time().'.'.$fileName->getClientOriginalExtension();
        //     $image_resize = Image::Make($fileName->getRealPath());
        //     $image_resize->resize(1000, 1000,
        //         function($constraint){
        //             $constraint->aspectRatio();
        //             $constraint->upsize();
        //         }
        //     );
        //     $image_resize->save(public_path('images/restaurant/'.$newName));
        //     $restaurant->image = 'images/restaurant/' .$newName;
        // }

        $restaurant->save();
        toast("Restaurant Details Added Successfully", "success");
        return redirect('/restaurants');
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
        $restaurants = Restaurant::find($id);
        $restaurantCategories = RestaurantCategory::all();
        return view('restaurant.edit', compact('restaurants', 'restaurantCategories'));
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
        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->phone_number = $request->phone_number;
        $restaurant->description = $request->description;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->restaurant_category_id = $request->restaurant_category_id;

        if($request->hasFile('image')){
            $fileName = $request->image;
            $newName = time().$fileName->getClientOriginalName();
            // $image_resize = Image::make($image->getRealPath());
            //     $image_resize->resize(600,600,
            //         function($constraint){
            //             $constraint->aspectRatio();
            //             $constraint->upsize();
            //         }
            //     );
            $fileName->move('images/restaurant/', $newName);
            $restaurant->image = 'images/restaurant/'.$newName;
        }

        // if($request->hasFile('image')){
        //     if($restaurant->image){
        //         @unlink($restaurant->image);
        //     }
        //     $fileName = $request->image;
        //     $newName = time().'.'.$fileName->getClientOriginalExtension();
        //     $image_resize = Image::Make($fileName->getRealPath());
        //     $image_resize->resize(200, 200,
        //         function($constraint){
        //             $constraint->aspectRatio();
        //             $constraint->upsize();
        //         }
        //     );
        //     $image_resize->save(public_path('images/restaurant/'.$newName));
        //     $restaurant->image = 'images/restaurant/' .$newName;
        // }
        
        $restaurant->update();
        // $request->session()->flash('message', 'Restaurant Information updated successfully.');
        // return redirect()->back();
        return redirect('/restaurants')->with('message', 'Food Categories added succesfully');

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

    // public function allRestaurant()
    // {
    //     $restaurants = Restaurant::all();
    //     return view('restaurant.index', compact('restaurants'));
    // }


//     public function allRestaurant()
//    {
//     return view('all_restaurant.index');
//     return view('restaurant.edit', compact('restaurants'));

//    }

    public function allRestaurant()
    {
        // $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $restaurants = Restaurant::all();
        // return response()->json($restaurants);
        return view('all_restaurant.index', compact('restaurants'));

    }

    public function allUsers()
    {
        // $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $users = User::where('character', 0)->get();
        // return response()->json($restaurants);
        return view('all_user.index', compact('users'));

    }


}
