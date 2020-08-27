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
        //aqui los llammaos para tenerlos
        $this->call(UsersTableSeeder::class);
        $this->call(EntriesTableSeeder::class);
        
        //php artisan migrate:fresh --seed
    }
}
