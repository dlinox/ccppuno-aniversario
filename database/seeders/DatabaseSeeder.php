<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'redirect' => '/a',
        ]);

        Role::create([
            'name' => 'Supervisor',
            'redirect' => '/s',
        ]);

        User::create([
            'name' => 'Lino',
            'email' => 'lino@gmail.com',
            'roleId' => 1,
            'roleName' => 'Admin', // Asumiendo que la tabla 'roles' tiene una columna 'name'
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);


        User::create([
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'roleId' => 2,
            'roleName' => 'Supervisor', // Asumiendo que la tabla 'roles' tiene una columna 'name'
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);


        Ticket::create([
            'name' => 'HABILES',
            'quantity' => 100,
            'price' => 20.00,

        ]);

        Ticket::create([
            'name' => 'INHABILES Y PUBLICO EN GENERAL',
            'quantity' => 100,
            'price' => 50.00,
        ]);
    }
}
