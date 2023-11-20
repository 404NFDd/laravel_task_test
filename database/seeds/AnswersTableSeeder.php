<?php

use Illuminate\Database\Seeder;
use App\Models\Answers;
use Illuminate\Support\Facades\DB;


class AnswersTableSeeder extends Seeder
{
    public function run()
    {
        // 더미 데이터 100개 생성
        factory(App\Models\Answers::class, 200)->create();
    }
}