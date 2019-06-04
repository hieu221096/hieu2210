<?php
 
namespace App\Http\Controllers;
use Auth;
use App\User;
use Socialite;
 
class FacebookAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->User();
 
        $authUser = $this->findOrCreateUser($user);
        
        // Chỗ này để check xem nó có chạy hay không
        // dd($user);
 
        Auth::login($authUser, true);
 
        return redirect()->route('trangchu')->with('message','Login susscess , Shopping Now !!!');
    }
 
    private function findOrCreateUser($facebookUser){
        $authUser = User::where('provider_id', $facebookUser->id)->first();
 
        if($authUser){
            return $authUser;
        }
 
        return User::create([
            'name' => $facebookUser->name,
            'password' => $facebookUser->token,
            'email' => $facebookUser->email,
            'provider_id' => $facebookUser->id,
            'provider' => $facebookUser->id,
            'level' => 'user',
        ]);
    }
}