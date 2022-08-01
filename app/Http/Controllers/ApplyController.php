<?php

namespace App\Http\Controllers;

use App\Gamify\Points\UsedCoupon;
use App\Models\Apply;
use App\Models\Coupon;
use App\Models\Gem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isEmpty;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applies = Apply::all();
        return view('apply.index', compact('applies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applies = Apply::all();
        $customers = User::where('character',0)->get();
        return view('apply.create', compact('applies','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apply = new Apply();
        $gems = new Gem();
        $coupons = Coupon::all()->first();
        // $apply = $user->applies();
        // foreach ($coupons as $coupon){
        //     $eligible_code = $coupon['code'];
        // }
        // $coupon->

        // if ($apply->coupon_code == $coupons->code){
            $result = Apply::where('user_id',$request->user_id)->where('coupon_code', $request->coupon_code)->get();
            // foreach($coupons as $coupon){}
            // return count($result);
            $apply->coupon_code = $request->coupon_code;
            echo("Result: " );
             echo ($result);
            //  && ($apply->coupon_code == $coupons->code)
            if( count($result) != 1 )
            {
                print("dsd");
                $apply->actual_amount = $request->actual_amount;
                $apply->percent_off = $request->percent_off;
                $apply->commission = (15/100) * $apply->actual_amount;
                $apply->discount = ($apply->percent_off/100) * $apply->actual_amount;
                // return ("this is " . $apply->percent_off. $apply->actual_amount);
                $apply->total = $apply->actual_amount - $apply->discount;
                $apply->ba_receivable = $apply->commission - $apply->discount;
                $apply->coupon_code = $request->coupon_code;
                // return redirect('/apply')->with('message','this is written code' . $apply->coupon_code. 'this is cp code'. $coupons->code);
                $apply->user_id = $request->user_id;
                $apply->restaurant_id = Auth::user()->id;
                // $apply = $user->applies()-->create($request->only([]))
        
                //for giving points to users
        
                $apply->save();

                // switch ($apply->actual_amount) {
                //     case (1000):
                //         echo "Your favorite color is red!";
                //         Alert::error('Opps', '1 Coupon Does Not Exist !');
                //         break;
                //     case (3001 >= 6000):
                //         echo "Your favorite color is blue!";
                //         Alert::error('Opps', '2 Coupon Does Not Exist !');
                //         break;
                //     case (6001 >= 10000):
                //         echo "Your favorite color is green!";
                //         Alert::error('Opps', '3 Coupon Does Not Exist !');
                //         break;
                //     case (10001 >= 20000):
                //         echo "Your favorite color is green!";
                //         Alert::error('Opps', '4 Coupon Does Not Exist !');
                //         break;  
                //     case (20001 >= 40000):
                //         echo "Your favorite color is green!";
                //         Alert::error('Opps', '5 Coupon Does Not Exist !');
                //         break; 
                //     case (40001 >= 80000):
                //         echo "Your favorite color is green!";
                //         Alert::error('Opps', '6 Coupon Does Not Exist !');
                //         break; 
                //     case ( $apply->actual_amount > 80001 ):
                //         echo "Your favorite color is green!";
                //         Alert::error('Opps', '7 Coupon Does Not Exist !');
                //         break; 
                //     default:
                //       echo "Your favorite color is neither red, blue, nor green!";
                //       Alert::error('Opps', ' default          Coupon Does Not Exist !');
                //   }

                if ($apply->actual_amount <= 999 ){
                    Alert::error('Opps', 'Not eligible for gems');
                    return redirect('/apply');
                  
                } 
                elseif($apply->actual_amount <= 3000){
                    Alert::success('Hurray', '\'10\' gems added to user !');
                    $gems->user_id = $request->user_id;
                    $gems->restaurant_id = Auth::user()->id;
                    $gems->points = 10;
                    $gems->save();
                    return redirect('/apply');

                } 
                elseif($apply->actual_amount <= 6000){
                    Alert::success('Hurray', '\'20\' gems added to user !');
                    $gems->user_id = $request->user_id;
                    $gems->restaurant_id = Auth::user()->id;
                    $gems->points = 20;
                    $gems->save();
                    return redirect('/apply');
                }
                elseif($apply->actual_amount <= 10000){
                    Alert::success('Hurray', '\'30\' gems added to user !');
                    $gems->user_id = $request->user_id;
                    $gems->restaurant_id = Auth::user()->id;
                    $gems->points = 30;
                    $gems->save();
                    return redirect('/apply');
                }
                elseif($apply->actual_amount <= 20000){
                    Alert::success('Hurray', '\'50\' gems added to user !');
                    $gems->user_id = $request->user_id;
                    $gems->restaurant_id = Auth::user()->id;
                    $gems->points = 50;
                    $gems->save();
                    return redirect('/apply');
                }
                elseif($apply->actual_amount <= 40000){
                    Alert::success('Hurray', '\'70\' gems added to user !');
                    $gems->user_id = $request->user_id;
                    $gems->restaurant_id = Auth::user()->id;
                    $gems->points = 70;
                    $gems->save();
                    return redirect('/apply');
                }
                elseif($apply->actual_amount <= 80000){
                    Alert::success('Hurray', '\'90\' gems added to user !');
                    $gems->user_id = $request->user_id;
                    $gems->restaurant_id = Auth::user()->id;
                    $gems->points = 90;
                    $gems->save();
                    return redirect('/apply');
                }
                elseif($apply->actual_amount > 80000){
                    Alert::success('Hurray', '\'100\' gems added to user !');
                    $gems->user_id = $request->user_id;
                    $gems->restaurant_id = Auth::user()->id;
                    $gems->points = 100;
                    $gems->save();
                    return redirect('/apply');
                }


                toast("Coupon Applied Successfully !","success");
            } 
            elseif ( count($result) == 1) {
                Alert::error('Opps', 'Coupon Already Used!');
                return redirect('/apply');
            } 
            elseif ($apply->coupon_code == $coupons->code) {
                Alert::error('Opps', 'Coupon Does not Exist!');
                return redirect('/apply');
            }
            else{
                print($result);
                Alert::error($result);
                return redirect('/apply');
            }

       
        
        // return redirect('/apply')->with('message', 'Coupon ERROR');
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
        $applies = Apply::select('restaurant_id', 'user_id');
        return view('apply.index', compact('applies'));
    }
}
