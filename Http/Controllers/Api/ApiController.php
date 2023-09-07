<?php

namespace Modules\TopPilot\Http\Controllers\Api;

use App\Contracts\Controller;
use Illuminate\Http\Request;

/**
 * class ApiController
 * @package Modules\TopPilot\Http\Controllers\Api
 */
class ApiController extends Controller
{
    /**
     * Just send out a message
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->message('Hello, world!');
    }

    /**
     * Handles /hello
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function hello(Request $request)
    {
        // Another way to return JSON, this for a custom response
        // It's recommended to use Resources for responses from the database
        return response()->json([
            'name' => Auth::user()->name,
        ]);
    }

}
