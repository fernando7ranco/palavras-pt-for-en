<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\Providers\SocialAccountService;

class SocialAuthController extends Controller
{
	public function error($email)
	{
		return "<h2>já possui um usuario cadastrado com esté email: <small>{$email}</small></h2>
				<script>
					setTimeout(function(){ 
						location.href = '".url('/login')."';
					},5000);
				</script>";
	}

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callbackFacebook(SocialAccountService $service)
    {
        $userS = \Socialite::driver('facebook')
											->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
											->user();
 
        $user = $service->createOrGetUser($userS, 'facebook');

        auth()->login($user);

        return redirect()->to('/home');
    }    
	
	
	public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();   
    }   

    public function callbackGoogle(SocialAccountService $service)
    {

        $userS = \Socialite::driver('google')
											->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
											->user();
		
        $user = $service->createOrGetUser($userS, 'google');

        auth()->login($user);

        return redirect()->to('/home');
    }
	

}