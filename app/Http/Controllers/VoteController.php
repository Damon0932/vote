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
        if ($request->has('email') && $request->has('category') && $request->input('email') && $request->input('category')) {
            $products = Product::where('category', $request->get('category'))->get();
            return view('votes.vote', [
                'email' => $request->input('email'),
                'products' => $products
            ]);
        } else {
            return view('votes.index');
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
        $email = $request->input('email');
        $votes = $request->input('votes');
        foreach ($votes as $vote) {
            foreach ($vote['questions'] as $question) {
                $data = [
                    'email' => $email,
                    'product_id' => $vote['id'],
                    'question' => $question['question'],
                    'answer' => $question['answer'],
                    'type' => $question['type']
                ];
                Vote::create($data);
            }
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
