<?php

use Illuminate\Database\Seeder;

class KhachHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        for ($i=1;$i <= count($types); $i++){
            array_push($list,[
                'kh_ma' => $i,

            ]
        }
    }
}
