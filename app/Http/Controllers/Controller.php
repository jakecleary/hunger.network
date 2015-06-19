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
        }
    }

}
