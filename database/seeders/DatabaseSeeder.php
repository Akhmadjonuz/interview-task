<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "admin";
        $admin->email = "admin@buypin.shop";
        $admin->reg_type = "email";
        $admin->password = Hash::make('1234567890');
        $admin->role = 1;
        $admin->save();

        $user = new User();
        $user->name = 'Ahmadjon';
        $user->reg_type = 'phone';
        $user->phone_number = '998902224311';
        $user->password = Hash::make('1234567890');
        $user->save();

        $type = new Type();
        $type->name = 'ID';
        $type->save();

        $type = new Type();
        $type->name = 'PROMOCODE';
        $type->save();
    }
}
