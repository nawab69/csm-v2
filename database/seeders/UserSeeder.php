<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug','admin')->first();
        // Create admin
        $escrow = User::updateOrCreate([
            'role_id' => $adminRole->id,
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username'  => 'admin',
            'email' => 'admin@mail.com',
            'phone' => '134567',
            'password' => Hash::make('password'),
            'status' => true
        ])->escrow()->updateOrCreate([
            'btc' => 0,
        ])->user->kyc()->updateOrCreate([
            'id_status' => 'not_submit',
        ]);

        // Create user
        $userRole = Role::where('slug','user')->first();
        User::updateOrCreate([
            'role_id' => $userRole->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username'  => 'johndoe',
            'email' => 'user@mail.com',
            'phone' => '1345767',
            'password' => Hash::make('password'),
            'status' => true
        ])->escrow()->updateOrCreate([
            'btc' => 0,
        ])->user->kyc()->updateOrCreate([
            'id_status' => 'not_submit',
        ]);

//        // Create user 2
//        $userRole = Role::where('slug','user')->first();
//        User::updateOrCreate([
//            'role_id' => $userRole->id,
//            'first_name' => 'Jane',
//            'last_name' => 'Doe',
//            'username'  => 'janedoe',
//            'email' => 'user2@mail.com',
//            'phone' => '1345767897',
//            'password' => Hash::make('password'),
//            'status' => true
//        ])->escrow()->updateOrCreate([
//            'btc' => 0,
//        ])->user->kyc()->updateOrCreate([
//            'id_status' => 'not_submit',
//        ]);

        Bank::factory()->count(8)->create();
    }
}
