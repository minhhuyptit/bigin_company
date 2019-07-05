<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            array('del_flag' => false, 'name' => 'Vote for Happy Hour', 'repeat_type' => 16, 'repeat_on_day' => 'friday', 'status' => true, 'start_time'=> '09:00:00', 'end_time' => '14:00:00', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
        ]);
    }
}
