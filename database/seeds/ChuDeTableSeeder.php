<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ChuDeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $now = new Carbon('2018-11-01','Asia/Ho_Chi_Minh');
        $list = [];
        for ($i=1;$i <= 100; $i++){
            $created = $now->copy()->addSeconds(
                $faker->numberBetween(1, 259200));// add them 1 giay
            $updated = $created->copy()->addSeconds(
                $faker->numberBetween(300, 172800));
            array_push($list,
                [
                    'cd_taoMoi' => $created,
                    'cd_capNhat' => $updated,
                    'cd_ten' => $faker->text(50),
                    'cd_trangThai' => 2]);
            $now = $updated->copy();
        }
        DB::table('chude')->insert($list);
    }
}
