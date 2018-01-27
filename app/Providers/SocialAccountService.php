<?php

namespace App\Providers;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Model\Auth\SocialAccount;
use App\User;

class SocialAccountService
{
	
    public function createOrGetUser(ProviderUser $providerUser, $socialName)
    {
        $account = SocialAccount::whereProvider($socialName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {


            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
					'password' => bcrypt(str_random())
                ]);
            }else{
				$url = url('/authsocial/erro/'. $providerUser->getEmail());
				header("location:{$url}");
				exit;
			}
			
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $socialName
            ]);

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}