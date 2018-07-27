<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class devSeeder extends Seeder
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
        $user->password=bcrypt("12346789");
        $user->email="sanjam531@gmail.com";
        $user->phone_number="9815333040";
        $user->type = "EXECUTIVE_MEMBER";
        $user->is_mailed="1";
        $user->is_active="1";
        $user->is_verified="1";
        $user->save();
    }
}
