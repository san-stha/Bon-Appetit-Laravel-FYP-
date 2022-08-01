<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RegisteredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        //  $validator = Validator::make($request->all(),[
        //      'name' => 'required',
        //      'email' => 'required',
        //      'password' => 'required'
        //  ]);
        //  $user = new User();
        //  $user->firstName = $request->firstName;
        //  $user->lastName = $request->lastName;
        //  $user->phoneNumber = $request->phoneNumber;
        //  $user->email = $request->email;
        //  $user->password = Hash::make($request->password);
        //  $user->conformPassword = Hash::make($request->conformPassword);
        //  $user->save();
        //  return response()->json([
        //      'message' => 'User Create'
        //  ], 201);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->character = $request->character;
        $user->password = Hash::make($request->password);
        // $user->save();ipco
        $uniqid = uniqid();
        $user->save();
        $name = strtoupper($request->name);



        $args = http_build_query(array(
            'auth_token' => '1955db2f23a27d4e6226a604873c922614f72e6c94547d5035932efe8e9a4989',
            'to'    => $request->phone_number,
            'text' => "Dear $name,\nAccount Registration Successful.\nRegards, Bon Appetit"
        ));
        $url = "https://sms.aakashsms.com/sms/v3/send/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1); ///
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Response
        $response = curl_exec($ch);
        curl_close($ch);


        Notification::send($user, new RegisteredNotification);
        return response()->json([
            'message' => 'User Created'
        ], 201);
    }

    // logIn
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json([

                'message' => 'Unauthorized'
            ], 400);
        }
        $credintials = request(['email', 'password']);

        if (!Auth::attempt($credintials)) {
            return response()->json([

                'message' => 'Unauthorized'
            ], 500);
        }
        $user = User::where('email', $request->email)->first();

        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $tokenResult
        ], 200);
    }

    //  logout 
    public function logout(
        Request $request
    ) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(
            [
                'message' => 'Token Deleted'
            ],
            200
        );
    }
}
