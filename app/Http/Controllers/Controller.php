<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Facebook\FacebookSession;
use App\Models\User;

class Controller extends BaseController {

    public function __construct(Request $request)
    {
        session_start();
        FacebookSession::setDefaultApplication('483981188444563', 'f91f4787e442c3947f675531aa473e3a');

        $user = User::find($request->session()->get('user', 0));
        if($user) {
            $this->user = $user;
            
            // If you're making app-level requests:
            $session = FacebookSession::newAppSession();

            // To validate the session:
            try {
                $session->validate();
            } catch (FacebookRequestException $ex) {
                // Session not valid, Graph API returned an exception with the reason.
                echo $ex->getMessage();
            } catch (\Exception $ex) {
                // Graph API returned info, but it may mismatch the current app or have expired.
                echo $ex->getMessage();
            }

            $this->facebook_user = $session;
        }
    }

}
