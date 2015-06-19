<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Map;

/**
 * Represent interactions with the Pin Suggestion system
 */
class PinController extends BaseController {

    /**
     * View the pins creation page.
     *
     * @param $request
     * @return \Illuminate\View\View
     */
    public function create($uid)
    {
        $map = Map::find($uid);

        if(!$map) {
            return redirect('login');
        }

        return view('pins.create', compact('map'));
    }

    /**
     * Save a pins.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        dd($request->input());
    }

    /**
     * View a pins.
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('pins.show');
    }
}
