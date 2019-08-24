<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_permissions')->insert([
            array('role_id' => 2, 'permission_id' => 1),
            array('role_id' => 2, 'permission_id' => 2),
            array('role_id' => 2, 'permission_id' => 3),
            array('role_id' => 2, 'permission_id' => 4),
            array('role_id' => 2, 'permission_id' => 5),
            array('role_id' => 2, 'permission_id' => 6),
            array('role_id' => 2, 'permission_id' => 7),
            array('role_id' => 2, 'permission_id' => 8),
            array('role_id' => 2, 'permission_id' => 9),
            array('role_id' => 2, 'permission_id' => 10),
            array('role_id' => 2, 'permission_id' => 11),
            array('role_id' => 2, 'permission_id' => 12),
            array('role_id' => 2, 'permission_id' => 13),
            array('role_id' => 2, 'permission_id' => 14),
            array('role_id' => 2, 'permission_id' => 15),
            array('role_id' => 2, 'permission_id' => 16),
            array('role_id' => 2, 'permission_id' => 17),
            array('role_id' => 2, 'permission_id' => 18),
            array('role_id' => 2, 'permission_id' => 19),
            array('role_id' => 2, 'permission_id' => 20),
            array('role_id' => 2, 'permission_id' => 21),
            array('role_id' => 2, 'permission_id' => 22),
            array('role_id' => 2, 'permission_id' => 23),
            array('role_id' => 2, 'permission_id' => 24),
            array('role_id' => 2, 'permission_id' => 25),
            array('role_id' => 2, 'permission_id' => 26),
            array('role_id' => 2, 'permission_id' => 27),
            array('role_id' => 2, 'permission_id' => 28),
            array('role_id' => 2, 'permission_id' => 29),
            array('role_id' => 2, 'permission_id' => 30),
            array('role_id' => 2, 'permission_id' => 31),
            array('role_id' => 2, 'permission_id' => 32),
            array('role_id' => 2, 'permission_id' => 33),
            array('role_id' => 2, 'permission_id' => 34),
            array('role_id' => 2, 'permission_id' => 35),
            array('role_id' => 2, 'permission_id' => 36),
            array('role_id' => 3, 'permission_id' => 1),
            array('role_id' => 3, 'permission_id' => 2),
            array('role_id' => 3, 'permission_id' => 3),
            array('role_id' => 3, 'permission_id' => 4),
            array('role_id' => 3, 'permission_id' => 5),
            array('role_id' => 3, 'permission_id' => 6),
            array('role_id' => 3, 'permission_id' => 7),
            array('role_id' => 3, 'permission_id' => 8),
            array('role_id' => 3, 'permission_id' => 9),
            array('role_id' => 3, 'permission_id' => 10),
            array('role_id' => 3, 'permission_id' => 11),
            array('role_id' => 3, 'permission_id' => 12)
        ]);
    }
}
