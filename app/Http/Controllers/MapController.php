<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

/**
 * Represent interactions with a Dashboard
 */
class MapController extends BaseController {

    /**
     * View the map creation page.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('maps.create');
    }

    /**
     * Save a map.
     * @return \Illuminate\View\View
     */
    public function store()
    {
        return view('maps.index');
    }

    /**
     * View a map.
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('maps.show');
    }
}
