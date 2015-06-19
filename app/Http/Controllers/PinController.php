<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

/**
 * Represent interactions with the Pin Suggestion system
 */
class PinController extends BaseController {

    /**
     * View the pins creation page.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pins.create');
    }

    /**
     * Save a pins.
     * @return \Illuminate\View\View
     */
    public function store()
    {
        return view('pins.index');
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
