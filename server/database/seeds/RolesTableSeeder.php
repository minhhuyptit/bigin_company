<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('roles')->insert([
            array('del_flag' => false, 'name' => 'root',    'description' => 'Description about Root',   'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'admin',   'description' => 'Description about Admin',  'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'member',  'description' => 'Description about Member', 'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'))
        ]);
    }
}
