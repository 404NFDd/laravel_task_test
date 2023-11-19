@extends('answer.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">입력이 완료되었습니다</h5>
            <p>메인 화면으로 돌아가세요.</p>
            <div class="mt-3">
                <a href="{{ route('answer.index') }}" class="btn btn-primary">메인 화면으로</a>
            </div>
        </div>
    </div>
@endsection
