<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creamos usuarios falsos para que si tenemos que reiniciar la base de datos
        //tener estos usuarios por default con seed 
        //php artisan make:seeder UsersTableSeeder

        User::create([
            'name'=>'jesus',
            'email'=>'peyo@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        //utilizamos factory para crear datos ficticios
        factory(User::class,10)->create();
        //lo curres usando php artisan migrate:fresh
    }
}
