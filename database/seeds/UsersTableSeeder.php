<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username ="ABCD";        
        $user->password=bcrypt("123456");
        $user->email="sanjam531@gmail.com";
        $user->phone_number="1234567890";
        $user->type = "EXECUTIVE_MEMBER";
        $user->is_active="1";
        $user->is_verified="1";
        $user->save();
    }
}
