<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class VoteController
 * @package App\Http\Controllers
 */
class VoteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('vote.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vote(Request $request)
    {
        return view('vote.vote');
    }


}
