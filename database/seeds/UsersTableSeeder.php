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
        $user->username ="123456789012";        
        $user->password=bcrypt("123456789");
        $user->email="kmvsingh007@gmail.com";
        $user->phone_number="8196059606";
        $user->type = "EXECUTIVE_MEMBER";
        $user->is_mailed="1";
        $user->is_active="1";
        $user->is_verified="1";
        $user->save();
    }
}
