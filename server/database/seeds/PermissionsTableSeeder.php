<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('permissions')->insert([
            array('del_flag' => false, 'name' => "Create Member",       'value' => 'member.create',     'description' => 'Description about create member',         'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Member",         'value' => 'member.read',       'description' => 'Description about read member',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Member",       'value' => 'member.update',     'description' => 'Description about update member',         'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Member",       'value' => 'member.delete',     'description' => 'Description about delete member',         'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),

            array('del_flag' => false, 'name' => "Create Team",         'value' => 'team.create',       'description' => 'Description about create team',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Team",           'value' => 'team.read',         'description' => 'Description about read team',             'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Team",         'value' => 'team.update',       'description' => 'Description about update team',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Team",         'value' => 'team.delete',       'description' => 'Description about delete team',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),

            array('del_flag' => false, 'name' => "Create Candidate",    'value' => 'candidate.create',  'description' => 'Description about create candidate',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Candidate",      'value' => 'candidate.read',    'description' => 'Description about read candidate',        'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Candidate",    'value' => 'candidate.update',  'description' => 'Description about update candidate',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Candidate",    'value' => 'candidate.delete',  'description' => 'Description about delete candidate',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),

            array('del_flag' => false, 'name' => "Create Event",        'value' => 'event.create',      'description' => 'Description about create event',          'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Event",          'value' => 'event.read',        'description' => 'Description about read event',            'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Event",        'value' => 'event.update',      'description' => 'Description about update event',          'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Event",        'value' => 'event.delete',      'description' => 'Description about delete event',          'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),

            array('del_flag' => false, 'name' => "Create Food",         'value' => 'food.create',       'description' => 'Description about create food',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Food",           'value' => 'food.read',         'description' => 'Description about read food',             'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Food",         'value' => 'food.update',       'description' => 'Description about update food',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Food",         'value' => 'food.delete',       'description' => 'Description about delete food',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),

            array('del_flag' => false, 'name' => "Create Interview",    'value' => 'interview.create',  'description' => 'Description about create interview',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Interview",      'value' => 'interview.read',    'description' => 'Description about read interview',        'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Interview",    'value' => 'interview.update',  'description' => 'Description about update interview',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Interview",    'value' => 'interview.delete',  'description' => 'Description about delete interview',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),

            array('del_flag' => false, 'name' => "Create Role",         'value' => 'role.create',       'description' => 'Description about create role',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Role",           'value' => 'role.read',         'description' => 'Description about read role',             'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Role",         'value' => 'role.update',       'description' => 'Description about update role',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Role",         'value' => 'role.delete',       'description' => 'Description about delete role',           'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),

            array('del_flag' => false, 'name' => "Create Permission",   'value' => 'permission.create',  'description' => 'Description about create permission',    'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Permission",     'value' => 'permission.read',    'description' => 'Description about read permission',      'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Permission",   'value' => 'permission.update',  'description' => 'Description about update permission',    'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Permission",   'value' => 'permission.delete',  'description' => 'Description about delete permission',    'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),

            array('del_flag' => false, 'name' => "Create Configuration",'value' => 'configuration.create',  'description' => 'Description about create configuration', 'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Read Configuration",  'value' => 'configuration.read',    'description' => 'Description about read configuration',   'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Update Configuration",'value' => 'configuration.update',  'description' => 'Description about update configuration', 'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
            array('del_flag' => false, 'name' => "Delete Configuration",'value' => 'configuration.delete',  'description' => 'Description about delete configuration', 'created_by' => 1, 'modified_by' => 1, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')),
        ]);
    }
}
