<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TeamMembersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('team_members')->insert([
            array('member_id' => 1,     'team_id' => 1, 'team_member_role' => 4, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 2,     'team_id' => 1, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 3,     'team_id' => 1, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 4,     'team_id' => 1, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 5,     'team_id' => 1, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 6,     'team_id' => 1, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 7,     'team_id' => 1, 'team_member_role' => 9, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 8,     'team_id' => 1, 'team_member_role' => 7, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 9,     'team_id' => 1, 'team_member_role' => 2, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 2,     'team_id' => 2, 'team_member_role' => 4, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 10,    'team_id' => 2, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 11,    'team_id' => 2, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 12,    'team_id' => 2, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 13,    'team_id' => 2, 'team_member_role' => 10, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 14,    'team_id' => 2, 'team_member_role' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 15,    'team_id' => 2, 'team_member_role' => 5, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 16,    'team_id' => 2, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 3,     'team_id' => 3, 'team_member_role' => 4, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 17,    'team_id' => 3, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 18,    'team_id' => 3, 'team_member_role' => 7, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 19,    'team_id' => 3, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 20,    'team_id' => 3, 'team_member_role' => 3, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 21,    'team_id' => 3, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 22,    'team_id' => 3, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 6,     'team_id' => 3, 'team_member_role' => 6, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 4,     'team_id' => 4, 'team_member_role' => 4, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 1,     'team_id' => 4, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 5,     'team_id' => 4, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 4,     'team_id' => 4, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 2,     'team_id' => 4, 'team_member_role' => 5, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 3,     'team_id' => 4, 'team_member_role' => 3, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 7,     'team_id' => 4, 'team_member_role' => 7, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 10,    'team_id' => 4, 'team_member_role' => 10, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 5,     'team_id' => 5, 'team_member_role' => 4, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 2,     'team_id' => 5, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 3,     'team_id' => 5, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 4,     'team_id' => 5, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 1,     'team_id' => 5, 'team_member_role' => 3, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 6,     'team_id' => 5, 'team_member_role' => 7, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 7,     'team_id' => 5, 'team_member_role' => 6, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 8,     'team_id' => 5, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 6,     'team_id' => 6, 'team_member_role' => 4, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 9,     'team_id' => 6, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 10,    'team_id' => 6, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 11,    'team_id' => 6, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 12,    'team_id' => 6, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 13,    'team_id' => 6, 'team_member_role' => 8, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 14,    'team_id' => 6, 'team_member_role' => 7, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 15,    'team_id' => 6, 'team_member_role' => 2, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 7,     'team_id' => 7, 'team_member_role' => 4, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 16,    'team_id' => 7, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 17,    'team_id' => 7, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 18,    'team_id' => 7, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 19,    'team_id' => 7, 'team_member_role' => 7, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 20,    'team_id' => 7, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 21,    'team_id' => 7, 'team_member_role' => 2, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 22,    'team_id' => 7, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 8,     'team_id' => 8, 'team_member_role' => 4, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 6,     'team_id' => 8, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 1,     'team_id' => 8, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 5,     'team_id' => 8, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 4,     'team_id' => 8, 'team_member_role' => 2, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 2,     'team_id' => 8, 'team_member_role' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 3,     'team_id' => 8, 'team_member_role' => 5, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 7,     'team_id' => 8, 'team_member_role' => 7, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('member_id' => 10,    'team_id' => 8, 'team_member_role' => 11, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
        ]);
    }
}
