<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

use App\Models\User;

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
        $helper = new FacebookRedirectLoginHelper(getenv('APP_URL').'/auth-callback');
        $loginUrl = $helper->getLoginUrl() . 'publish_actions,email';
        return view('user.login', compact('loginUrl'));
    }

    /**
     * Handle GET to /auth-callback
     *
     * @param  Request $request
     * @return HttpResponse
     */
    public function auth(Request $request)
    {
        $helper = new FacebookRedirectLoginHelper(getenv('APP_URL').'/auth-callback');

        try {
            $session = $helper->getSessionFromRedirect();
        } catch(FacebookRequestException $ex) {
            dd($ex);
        } catch(\Exception $ex) {
            dd($ex);
        }

        if ($session) {
            $token = $session->getToken();

            try {
                $user_profile = (new FacebookRequest(
                    $session, 'GET', '/me'
                ))->execute()->getGraphObject(GraphUser::className());
            } catch(FacebookRequestException $e) {
                echo "Exception occured, code: " . $e->getCode();
                echo "with message: " . $e->getMessage();
            }

            $user = User::create([
                'oauth' => $token,
                'name'  => $user_profile->getName(),
                'email' => $user_profile->getEmail(),
            ]);

            $request->session()->put('user', $user->id);
            return redirect('maps.create');
        }
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
