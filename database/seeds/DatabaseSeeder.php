<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Role::class,3)->create();
        factory(App\User::class,10)->create();
        factory(App\Company::class,5)->create();
        factory(App\Project::class,20)->create();
    }
}
