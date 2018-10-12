<?php

use Illuminate\Database\Seeder;
use App\Models\HomePage;

class HomePageStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homePage = new HomePage;
        $homePage->office_type="STUDENT";
        $homePage->office_widget="STUDENT";
        $homePage->office_name="Mr.Harpreet Randhawa";
        $homePage->office_position="Student Coordinator";
        $homePage->office_email="harpreetrandhawa999@gmail.com";
        $homePage->office_picture="student.jpg";
        $homePage->office_phone="+91-81980-77793";  
        $homePage->save();
    }
}
