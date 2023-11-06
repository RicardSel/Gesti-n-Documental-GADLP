<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use app\User;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'tipo' => 'ADMINISTRADOR',
            'foto' => 'user_default.png',
            'estado' => 1
        ]);
    }
}
