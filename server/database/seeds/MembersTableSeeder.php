<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            array('del_flag' => false, 'email' => 'minhhuy97.ptit@gmail.com', 'password' => bcrypt('123456'), 'fullname' => 'Nguyễn Hà Minh Huy', 'is_male' => true, 'birthday' => '1997-06-21', 'phone' => '0794755005', 'picture' => 'avatar_1.png', 'role' => 2, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'email' => 'dinhhanh97.ptit@gmail.com', 'password' => bcrypt('123456'), 'fullname' => 'Dương Đình Hạnh', 'is_male' => true, 'birthday' => '1997-04-25', 'phone' => '0929339197', 'picture' => 'avatar_2.png', 'role' => 2, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'))
        ]);
    }
}
