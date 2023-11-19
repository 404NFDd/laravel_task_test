@extends('answer.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('answer.confirm') }}" method="post">
                @csrf
                <!-- 이름 -->
                <div class="form-group">
                    <label for="fullname">이름</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname') }}" required>
                </div>

                <!-- 성별 -->
                <div class="form-group">
                    <label>성별</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{ old('gender', 1) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="male">남자</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="female">여자</label>
                    </div>
                </div>

                <!-- 연령 -->
                <div class="form-group">
                    <label for="age_id">연령</label>
                    <select class="form-control" id="age_id" name="age_id" required>
                        @foreach($ages as $age)
                            <option value="{{ $age->sort }}" {{ old('age_id') == $age->sort ? 'selected' : '' }}>{{ $age->age }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- 이메일 -->
                <div class="form-group">
                    <label for="email">이메일</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <!-- 홍보용 메일 수신동의 -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_send_email" name="is_send_email" {{ old('is_send_email', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_send_email">홍보용 메일 수신동의</label>
                </div>

                <!-- 질문사항 -->
                <div class="form-group">
                    <label for="feedback">질문사항</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="3">{{ old('feedback') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">제출</button>
            </form>
        </div>
    </div>
@endsection
