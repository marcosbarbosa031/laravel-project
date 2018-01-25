<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            'cpf'           => '55555555554',
            'name'          => 'Marcos',
            'phone'         => '123456789',
            'birth'         => '1994-03-31',
            'gender'        => 'M',
            'email'         => 'teste2@email.com',
            'password'      => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
