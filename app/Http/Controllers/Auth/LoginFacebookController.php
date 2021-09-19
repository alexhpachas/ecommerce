<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginFacebookController extends Controller
{
    public function redirect($driver)
        {

            $drivers = ['facebook','google'];

            if (in_array($driver,$drivers)) {
                return Socialite::driver($driver)->redirect();    
            }else{
                return redirect()->route('login')->with('info', $driver . 'No es una red social válida para iniciar sessión');
            }                                                
        }

    public function callback(Request $request, $driver){

        if ($request->get('error')) {
            return redirect()->route('login');
        }

        $userSocialite = Socialite::driver($driver)->stateless()->user();            

        $socialProfile_id = SocialProfile::where('social_id',$userSocialite->getId())
                            ->where('social_name',$driver)->first();
                               
        if (!$socialProfile_id) {

            $user = User::where('email',$userSocialite->getEmail())->first();
        
            if (!$user) {
                $user = User::create([
                    'name' => $userSocialite->getName(),
                    'email' => $userSocialite->getEmail(),
        
                ]);    
            }

            SocialProfile::create([
                'user_id' => $user->id,
                'social_id' => $userSocialite->getId(),
                'social_name' => $driver,
                'social_avatar' => $userSocialite->getAvatar()
            ]);
        
        }

        auth()->login($socialProfile_id->user);

        return redirect()->route('index');        
        
    }
}
