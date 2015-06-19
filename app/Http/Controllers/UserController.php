<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

/**
 * Represent interactions with a User
 */
class UserController extends BaseController {

    /**
     * Handle GET to /login
     *
     * @return HttpResponse
     */
    public function showLogin()
    {
        return view('user.login');
    }

    /**
     * Handle POST to /login
     *
     * @return HttpResponse
     */
    public function doLogin(Request $request)
    {
        $oAuth = $request->input('facebook_oAuth');
        if(!$oAuth) {
            return response()->json([
                'error' => 'Missing Facebook Key'
            ]);
        }

        return redirect('dashboard');
    }
}
