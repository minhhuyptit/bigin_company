<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('configurations')->insert([
            array('del_flag' => false, 'value' => 'root', 'description' => 'Description about Root', 'type' => 'role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'admin', 'description' => 'Description about Admin', 'type' => 'role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'member', 'description' => 'Description about Member', 'type' => 'role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'create_member', 'description' => 'Description about create member', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'read_member', 'description' => 'Description about read member', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'update_member', 'description' => 'Description about update member', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'delete_member', 'description' => 'Description about delete member', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'create_member', 'description' => 'Description about create member', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'read_food', 'description' => 'Description about read food', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'update_food', 'description' => 'Description about update food', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'delete_food', 'description' => 'Description about delete food', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'create_event', 'description' => 'Description about create event', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'read_event', 'description' => 'Description about read event', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'update_event', 'description' => 'Description about update event', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'delete_event', 'description' => 'Description about delete event', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'create_config', 'description' => 'Description about create config', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'read_config', 'description' => 'Description about read config', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'update_config', 'description' => 'Description about update config', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'delete_config', 'description' => 'Description about delete config', 'type' => 'permission', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'weekly', 'description' => 'Description about Weekly', 'type' => 'repeat_type', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'monthly', 'description' => 'Description about Monthly', 'type' => 'repeat_type', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'yearly', 'description' => 'Description about Yearly', 'type' => 'repeat_type', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'Project Manager', 'description' => 'Description about PM', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'System Architect', 'description' => 'Description about SA', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'System Administrator', 'description' => 'Description about SA', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'Team Leader', 'description' => 'Description about TL', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'BA', 'description' => 'Description about BA', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'Technical', 'description' => 'Description about Technical', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'Tester', 'description' => 'Description about Tester', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'QA', 'description' => 'Description about QA', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'QC', 'description' => 'Description about QC', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'Data Analysis', 'description' => 'Description about DA', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'value' => 'Developer', 'description' => 'Description about Dev', 'type' => 'team_member_role', 'created_by' => 1, 'modified_by' => null, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'))
        ]);
    }
}
