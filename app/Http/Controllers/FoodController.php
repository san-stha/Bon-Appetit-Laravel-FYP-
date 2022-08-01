<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Image;
use Intervention\Image\Facades\Image;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $foods = Food::all();
        $foods = Food::where('user_id', Auth::user()->id)->get();
        return view('food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foods = Food::all();
        $foodCategories = FoodCategory::all();
        return view('food.create', compact('foods', 'foodCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food();
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->food_category_id = $request->food_category_id;
        $food->user_id = Auth::user()->id;

        // if($request->hasFile('image')){
        //     print("if ma gayo");
        //     $image = $request->file;
        //     $filename = $image->getClientOriginalName();
        //     // $new_name = time().$filename->getClient 
        //     $image_resize = Image::make($image->getRealPath());
        //     $image_resize->resize(300,300);
        //     $filename->save(public_path('images/food/'.$filename));
        //     $food->image = 'images/food/'.$filename;
        //     // $image_resize ->save(public_path('images/'.$filename));
        //     // return "Image has "
        // }

        // if($request->hasFile('image')){
        //     $fileName = $request->image;
        //     $newName = time().$fileName->getClientOriginalName();
        //     // $image_resize = Image::make($image->getRealPath());
        //     //     $image_resize->resize(600,600,
        //     //         function($constraint){
        //     //             $constraint->aspectRatio();
        //     //             $constraint->upsize();
        //     //         }
        //     //     );
        //     $fileName->move('images/food/', $newName);
        //     $food->image = 'images/food/'.$newName;
        // }

        if($request->hasFile('image')){
            if($food->image){
                @unlink($food->image);
            }
            $fileName = $request->image;
            $newName = time().'.'.$fileName->getClientOriginalExtension();
            $image_resize = Image::Make($fileName->getRealPath());
            $image_resize->resize(200, 200,
                function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
            $image_resize->save(public_path('images/food/'.$newName));
            $food->image = 'images/food/' .$newName;
            }
            
        $food->save();
        toast("Foods added successfully", "success");
        return redirect('/foods');
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
        $foods = Food::find($id);
        $foodCategories = FoodCategory::all();
        return view('food.edit', compact('foods', 'foodCategories'));
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
        // $food = Food::find($id);
        // $food->name = $request->name;
        // $food->price = $request->price;
        // $food->description = $request->description;

        // $food->update();
        // $request->session()->flash('message', 'Food Information updated successfully.');
        // return redirect()->back();

        $food = Food::find($id);
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->food_category_id = $request->food_category_id;
        $food->user_id = Auth::user()->id;

        if($request->hasFile('image')){
            if($food->image){
                @unlink($food->image);
            }
            $fileName = $request->image;
            $newName = time().'.'.$fileName->getClientOriginalExtension();
            $image_resize = Image::Make($fileName->getRealPath());
            $image_resize->resize(200, 200,
                function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
            $image_resize->save(public_path('images/food/'.$newName));
            $food->image = 'images/food/' .$newName;
        }
        $food->update();

        return redirect('/foods')->with('message', 'Food updated succesfully');
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
