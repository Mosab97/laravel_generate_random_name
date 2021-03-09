<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'number' => 10,
        ]);

    }


    private function fact($s)
    {
        if ($s == 0) return 1;
//        return $s;
        else return $fact = $s * $this->fact($s - 1);
    }

    public function generate(Request $request)
    {

        $rules = [
            'word' => 'required',
        ];

        $msg = [
            'word.required' => __('The Word is Required'),
        ];

        $validator = Validator::make($request->all(), $rules, $msg);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

//        $word = $request->get('word');

        $words = [];
        $word = $request->get('word');
        $words[] = $word;
        $arr = str_split($word);
//        $pow = pow(2, strlen($word));
        $pow = $this->fact(strlen($word));
        $pow = $pow >= 10000 ? 10000 : $pow;

        for ($i = 1; $i <= $pow; $i++) {
            shuffle($arr);
            $words[] = implode($arr);
        }
        return view('welcome', [
            'words' => $words,
            'word' => $word,
        ]);

    }
}
