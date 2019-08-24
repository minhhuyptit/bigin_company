<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(VotesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TeamMemberRolesTableSeeder::class);
        $this->call(TeamMembersTableSeeder::class);
    }
}
