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
        $user->user_id ="ABCD";        
        $user->password=bcrypt("123456");
        $user->type = "EXECUTIVE_MEMBER";
        $user->save();
    }
}
