<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodCategories = FoodCategory::where('user_id', Auth::user()->id)->get();;
        return view('foodCategory.index', compact('foodCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foodCategories = FoodCategory::all();
        return view('foodCategory.create', compact('foodCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foodCategory = new FoodCategory();
        $foodCategory->name = $request->name;
        $foodCategory->user_id = Auth::user()->id;
        // $foodCategory->price = $request->price;
        // $foodCategory->description = $request->description;
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
            $fileName->move('images/categoryFood/', $newName);
            $foodCategory->image = 'images/categoryFood/' . $newName;
        }
        $foodCategory->save();
        toast("Food categories added successfully", "success");
        return redirect('/foodCategories');
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
        $foodCategories = FoodCategory::find($id);
        return view('foodCategory.edit', compact('foodCategories'));
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
        $foodCategory = FoodCategory::find($id);
        $foodCategory->name = $request->name;
        $foodCategory->user_id = Auth::user()->id;
        // $foodCategory->price = $request->price;
        // $foodCategory->description = $request->description;
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
            $fileName->move('images/categoryFood/', $newName);
            $foodCategory->image = 'images/categoryFood/' . $newName;
        }
        $foodCategory->update();

        return redirect('/foodCategories')->with('message', 'Food Categories added succesfully');
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
