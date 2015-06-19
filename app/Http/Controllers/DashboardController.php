<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

/**
 * Represent interactions with a Dashboard
 */
class DashboardController extends BaseController {

    /**
     * Handle GET to /dashboard
     *
     * @return HttpResponse
     */
    public function show()
    {
        return view('dashboard.show');
    }
}
