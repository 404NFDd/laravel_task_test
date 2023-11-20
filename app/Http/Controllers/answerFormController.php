<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Answers; //새로 추가  
use App\Models\Ages;
use Illuminate\Validation\Rule;

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
        // 유효성 검사 
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|in:1,2',
            'age_id' => 'required|exists:ages,sort',
            'email' => 'required|email|max:255',
            'feedback' => 'nullable|string|max:10000',
        ]);
        // 사용자 입력 받아오기
        $data = [
            'fullname' => $request->input('fullname'),
            'gender' => $request->input('gender'),
            'age_id' => Ages::find($request->input('age_id'))->age,
            'email' => $request->input('email'),
            'is_send_email' => $request->input('is_send_email') ? '1' : '0',
            'feedback' => nl2br($request->input('feedback')), // 개행을 <br>로 변환
        ];

        session(['confirm_data' => $data]);

        return view('answer.confirm', compact('data'));
    }


    public function finish(Request $request)
    {
        // 세션에서 데이터를 가져옴
        $sessionData = $request->session()->get('confirm_data');
        // 데이터베이스에 저장
        $answer = new Answers();
        $answer->fullname = $sessionData['fullname'];
        $answer->gender = $sessionData['gender'];
        $answer->age_id = Ages::where('age', $sessionData['age_id'])->value('sort');
        $answer->email = $sessionData['email'];
        $answer->is_send_email = $sessionData['is_send_email'] == '수신 동의함' ? 1 : 0;
        $answer->feedback = $sessionData['feedback'];
        $answer->save();

        // dd($answer);

        // 세션에서 데이터를 제거
        $request->session()->forget('confirm_data');

        // Finish 뷰를 반환
        return redirect()->route('answer.index')->with('success', '입력이 완료되었습니다.');
    }

    public function show(){

        return view('answer.show');
    }
    public function system(Request $request)
    {
        $query = Answers::query();
    
        // 이름 검색어가 전달되었을 때만 적용
        if ($request->has('name')) {
            $name = $request->input('name');
            $query->where('fullname', 'like', '%' . $name . '%');
        }
    
        $answers = $query->paginate(10); // 한 페이지당 10개씩 보이게 설정
    
        // Gender와 Age 데이터를 불러오기
        $genderMap = ['1' => '남자', '2' => '여자'];
    
        // Ages 모델에서 sort 값을 기준으로 age를 가져오기
        $agesData = Ages::pluck('age', 'sort')->all();
    
        return view('answer.system', compact('answers', 'genderMap', 'agesData'))
            ->with('name', $request->input('name'))
            ->with('answers', $answers->appends($request->except('page')));
    }
    
    
}