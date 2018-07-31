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
        $user->username ="DevChannel";        
        $user->password=bcrypt("12346789");
        $user->email="kasam199796@gmail.com";
        $user->phone_number="1234567890";
        $user->type = "EXECUTIVE_MEMBER";
        $user->is_mailed="1";
        $user->is_active="1";
        $user->is_verified="1";
        $user->save();
    }
}
