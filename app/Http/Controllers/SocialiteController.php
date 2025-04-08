<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{   
    /**
     * Function:google login
     * Description:This function will redirect to google
     * @param NA
     * @return void
     */
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Function:googleAuthentication
     * Description:This function will authenticate the user through the google account
     * @param NA
     * @return void
     */

    public function googleAuthentication()
    {

        try {
            $googleUser = Socialite::driver('google')->user();

            $parent = ParentModel::where('google_id', $googleUser->id)->first();
            
            if($parent) {
               

               Auth::guard('parent')->loginUsingId($parent->id);

               return redirect()->route('parent.student_login');

           
               
            }else {
              $parentData = ParentModel::create([
                 'name'=> $googleUser->name,
                 'email' => $googleUser->email,
                 'password' => Hash::make('password@1234'),
                 'google_id' => $googleUser->id,
                 'terms' => true,
     
               ]);
     
               if($parentData) {
              //  dd(Auth::guard('parent')->check());

                Auth::guard('parent')->loginUsingId($parentData->id);
                return redirect()->route('parent.student_login');
          
    
                   
               }

               
        
            }

        }catch(Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            ToastMagic::error('Unable to login with google');
            return back();

        }
      
    }




    
}
