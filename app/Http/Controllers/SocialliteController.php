<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SocialliteController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $socialuser =  Socialite::driver('google')->stateless()->user();

        $registerUser = User::where('google_id', $socialuser->id)->first();

        if(!$registerUser){
            $user = User::updateOrCreate([
                'google_id' => $socialuser->id,
            ],[
                'name' => $socialuser->name,
                'email' => $socialuser->email,
                'password' => Hash::make('admin123'),
                'role' => 'pasien',
                'google_token' => $socialuser->token,
                'google_refresh_token' => $socialuser->refreshToken,
            ]);

            Auth::login($user);

            return redirect()->route('user_antrians');
        }
        

        Auth::login($registerUser);

        return redirect()->route('user_antrians')->with(Session::flash('berhasil_login', true));
    }
}
