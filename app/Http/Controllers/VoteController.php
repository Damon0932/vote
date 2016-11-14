<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vote;
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
        if ($request->has('email') && $request->input('email')) {
            $products = Product::all();
            return view('votes.vote', [
                'email' => $request->input('email'),
                'products' => $products
            ]);
        } else {
            return view('votes.index');
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vote(Request $request)
    {
        $email = $request->input('email');
        $answers = $request->input('answer');
        foreach ($answers as $answer) {
            $data = [
                'product_id' => $answer['id'],
                'answer' => $answer['answer'],
                'comment' => $answer['comment'],
                'email' => $email
            ];
            Vote::create($data);
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
            'results' => Vote::paginate('20')
        ]);
    }

    public function test() {
        $disk = QiniuStorage::disk('qiniu');
        $files = $disk->allFiles('/');
        foreach($files as $file) {
            $data = [
                'name' => $file,
                'img_url' => $disk->downloadUrl($file),
                'question' => '请对上图商品进行打分'
            ];
            Vote::create($data);
        }
        dd(Vote::all());
    }
}
