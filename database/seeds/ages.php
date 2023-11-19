<?php

use Illuminate\Database\Seeder;

class ages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ages')->insert([
            ['age' => '10대', 'sort' => 1],
            ['age' => '20대', 'sort' => 2],
            ['age' => '30대', 'sort' => 3],
            ['age' => '40대', 'sort' => 4],
            ['age' => '60대', 'sort' => 6],
        ]);
    }
}
