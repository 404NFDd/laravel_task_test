@extends('answer.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">등록 내용 확인</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>이름:</strong> {{ old('fullname', $data['fullname']) }}</li>
                <li class="list-group-item"><strong>성별:</strong> {{ $data['gender'] == 1 ? '남자' : '여자' }}</li>
                <li class="list-group-item"><strong>연령:</strong> {{ $data['age_id'] }}</li>
                <li class="list-group-item"><strong>이메일:</strong> {{ old('email', $data['email']) }}</li>
                <li class="list-group-item"><strong>홍보용 메일 수신동의:</strong> {{ $data['is_send_email'] == '1' ? '수신 동의함' : '수신 동의 안함' }}</li>
                <li class="list-group-item"><strong>질문사항:</strong> {!! old('feedback', $data['feedback']) !!}</li>
            </ul>
            <div class="mt-3">
                <a href="javascript:history.back()" class="btn btn-secondary">수정하기</a>
                <form action="{{ route('answer.finish') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">저장하고 다음으로</button>
                </form>
            </div>
        </div>
    </div>
@endsection
