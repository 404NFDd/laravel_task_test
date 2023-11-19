<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Answers; 
use App\Models\Ages;

class answerFormController extends Controller
{
    //
    public function index()
    {
        $ages = Ages::orderBy('sort', 'asc')->get();
        // dd($ages);
        return view('answer.index', compact('ages'));
    }
    public function confirm(Request $request)
    {
        // 사용자 입력 받아오기
        $data = [
            'fullname' => $request->input('fullname'),
            'gender' => $request->input('gender'),
            'age_id' => Ages::find($request->input('age_id'))->age,
            'email' => $request->input('email'),
            'is_send_email' => $request->input('is_send_email') ? '수신 동의함' : '수신 동의 안함',
            'feedback' => nl2br($request->input('feedback')), // 개행을 <br>로 변환
        ];

        // session(['confirm_data' => $data]);

        // dd(session()->all());

        return view('answer.confirm', compact('data'));
    }
}
