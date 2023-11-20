@extends('answer.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Answers 목록</h5>
            <ul class="list-group">
                {{ $answers->links() }}
                <form action="{{ route('answer.system') }}" method="get">
                    <div class="form-group">
                        <label for="name">이름 검색</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $name) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">검색</button>
                </form>                
                @foreach($answers as $answer)
                    <li class="list-group-item">
                        <strong>ID:</strong> {{ $answer->id }}<br>
                        <strong>이름:</strong> {{ $answer->fullname }}<br>
                        <strong>성별:</strong> {{ $genderMap[$answer->gender] }}<br>
                        <strong>연령:</strong> {{ $agesData[$answer->age_id] }}<br>
                        <strong>질문사항:</strong> {!! $answer->feedback !!}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
