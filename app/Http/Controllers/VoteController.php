<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vote;
use App\Models\VoteDetail;
use App\Models\VoteQuestion;
use Illuminate\Http\Request;
use App\Http\Requests;
use itbdw\QiniuStorage\QiniuStorage;

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function votePage(Request $request)
    {
        if( Vote::where('category', $request->input('category'))->count() < 200) {
            if ($request->has('phone') && $request->has('category') && $request->input('phone') && $request->input('category')) {
                $products = Product::where('category', $request->get('category'))->get();
                return view('votes.vote', [
                    'phone' => $request->input('phone'),
                    'products' => $products,
                    'category' => $request->input('category')
                ]);
            } else {
                return view('votes.index');
            }
        } else {
            dd('本次调研已经圆满结束，敬请期待下一轮调研');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function flrIndex()
    {
        return view('votes.flr');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bdrIndex(Request $request)
    {
        return view('votes.bdr');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function braIndex(Request $request)
    {
        return view('votes.bra');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vote(Request $request)
    {
        $info = $request->input('info');
        $voteData = [
            'phone' => $request->input('phone'),
            'job' => $info['job'],
            'age' => $info['age'],
            'name' => $info['name'],
            'category' => $request->input('category')
        ];
        $vote = Vote::create($voteData);

        $voteDetails = $request->input('votes');
        foreach ($voteDetails as $voteDetail) {
            foreach ($voteDetail['questions'] as $question) {
                $data = [
                    'product_id' => $voteDetail['id'],
                    'question' => $question['question'],
                    'answer' => $question['answer'],
                    'type' => $question['type'],
                    'vote_id' => $vote->id
                ];
                VoteDetail::create($data);
            }
        }

        $voteQuestions = $request->input('questions');
        foreach ($voteQuestions as $question) {
            $data = [
                'question' => $question['question'],
                'answer' => $question['answer'],
                'vote_id' => $vote->id
            ];
            VoteQuestion::create($data);
        }


        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result()
    {

        return view('votes.table', [
            'votes' => Vote::paginate('20')
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function voteDetails(Request $request)
    {
        return view('votes.detail-table', [
            'voteDetails' => VoteDetail::where('vote_id', $request->input('vote_id'))->paginate('6'),
            'voteId' => $request->input('vote_id')
        ]);
    }

    /**
     *
     */
    public function createProducts()
    {
        $disk = QiniuStorage::disk('qiniu');
        $files = $disk->allFiles('/不倒绒');
        foreach ($files as $file) {
            $data = [
                'name' => $file,
                'img_url' => $disk->downloadUrl($file),
                'category' => '不倒绒'
            ];
            Product::create($data);
        }

        $disk = QiniuStorage::disk('qiniu');
        $files = $disk->allFiles('/法兰绒');
        foreach ($files as $file) {
            $data = [
                'name' => $file,
                'img_url' => $disk->downloadUrl($file),
                'category' => '法兰绒'
            ];
            Product::create($data);
        }


        $files = $disk->allFiles('/文胸');
        foreach ($files as $file) {
            $data = [
                'name' => $file,
                'img_url' => $disk->downloadUrl($file),
                'category' => '文胸'
            ];
            Product::create($data);
        }
        dd(Product::all()->toArray());
    }

    /**
     *
     */
    public function data()
    {
        dd(Product::all()->toArray());
    }
}
