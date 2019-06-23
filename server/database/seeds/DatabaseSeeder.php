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
        $this->call(EventsTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(RolePermissionssTableSeeder::class);
        // $this->call(VotesTableSeeder::class);
    }
}
