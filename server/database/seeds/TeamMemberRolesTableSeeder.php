<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeamMemberRolesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('team_member_roles')->insert([
            array('del_flag' => false, 'name' => 'Project Manager',        'description' => 'Description about Project Manager',       'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'System Architect',       'description' => 'Description about System Architect',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'System Administrator',   'description' => 'Description about System Administrator',  'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'Team Leader',            'description' => 'Description about Team Leader',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'Business Analyst',       'description' => 'Description about Business Analyst',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'Technical',              'description' => 'Description about Technical',             'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'Tester',                 'description' => 'Description about Tester',                'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'QA',                     'description' => 'Description about QA',                    'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'QC',                     'description' => 'Description about QC',                    'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'Data Analysis',          'description' => 'Description about Data Analysis',         'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => 'Developer',              'description' => 'Description about Developer',             'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'))
        ]);
    }
}
