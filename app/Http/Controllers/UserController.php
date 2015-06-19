<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Facebook\FacebookRedirectLoginHelper;

/**
 * Represent interactions with a User
 */
class UserController extends Controller {

    /**
     * Handle GET to /login
     *
     * @param  Request $request
     * @return HttpResponse
     */
    public function login(Request $request)
    {
        $code = $request->input('code');
        if($code) {
            // Need to save code
            dd($code);
            // $user = User::create('');

            // Create session
            // $request->session()->put('user', $user->id);
        }

        $helper = new FacebookRedirectLoginHelper(getenv('APP_URL'));
        $loginUrl = $helper->getLoginUrl() . 'publish_actions';
        return view('user.login', compact('loginUrl'));
    }

    /**
     * Handle logging a user out of the app
     *
     * @param  Request $request
     * @return HttpResponse
     */
    public function logout(Request $request)
    {
        if($request->session()->has('user')) {
            $request->session()->forget('user');
        }

        return redirect('login');
    }
}
