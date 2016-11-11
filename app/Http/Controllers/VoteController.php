<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vote;
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
        return view('votes.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function votePage()
    {
        return view('votes.vote');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vote(Request $request)
    {
        $email = $request->input('email');
        $answers= $request->input('answer');
        foreach($answers as $answer) {
            $dataArray = explode('-', $answer);
            $data = [
                'product_id' => $dataArray[0],
                'answer' => $dataArray[1],
                'comment' => $dataArray[3],
                'email' => $email
            ];
            Vote::create($data);
        }
        return view('votes.index');
    }

}
