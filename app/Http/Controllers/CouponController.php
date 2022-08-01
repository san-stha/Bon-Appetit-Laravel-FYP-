<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $coupons = Coupon::all();
        // return view('coupon.index', compact('coupons'));
        $coupons = Coupon::all();
        return view('coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coupons = Coupon::all();
        return view('coupon.create', compact('coupons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->percent_off = $request->percent_off;
        // $coupon->value = $request->value;
        // $coupon->cart_value = $request->cart_value;

        $coupon->save();
        toast("Coupon Added Succesfully", "success");

        return redirect('/coupon');
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
        $coupons = Coupon::find($id);
        return view('coupon.edit', compact('coupons'));
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
        $coupon = Coupon::find($id);
        $coupon->code = $request->code;
        $coupon->percent_off = $request->percent_off;
        // $coupon->value = $request->value;
        // $coupon->cart_value = $request->cart_value;

        $coupon->update();

        return redirect('/coupon')->with('message', 'Coupon updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $note = Note::findOrFail($id);
        // $note->delete();
        // return response()->json([
        //     'message' => 'success'],200);

        $coupon = Coupon::find($id);
        $coupon->delete();
        return response()->json(['message' => 'success'],200);
    }

    // public function findByCode($code)
    // {
    //     return Coupon::where('code', $code)->first();
    //     // return $coupons;
    // }

    // public function discount(Request $request, $total, $id)
    // {
    //     $coupon = Coupon::find($id);
    //     $coupon->percent_off = $request->percent_off;
    //     return ($request->percent_off / 100) * $total;
    // }

}
