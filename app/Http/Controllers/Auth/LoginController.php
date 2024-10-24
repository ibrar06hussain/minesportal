<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $user=User::where('email',$request->email)->FirstOrFail();
        if($user->email_verified_at!=null){
            // Add the condition to check if the email is verified
            return [
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ];
        }
        else{
            return [
                'email' => '',
                'password' => ''
            ];
        }
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }
}
