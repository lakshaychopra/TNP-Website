<?php

use Illuminate\Database\Seeder;
use App\Models\HomePage;

class HomePageFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homePage = new HomePage;
        $homePage->office_type="FACULTY";
        $homePage->office_widget="FACULTY";
        $homePage->office_name="Prof. Sachin Bagga";
        $homePage->office_position="Faculty Co-Coordinator";
        $homePage->office_email="sachin8510@gmail.com";
        $homePage->office_picture="faculty.jpg";
        $homePage->office_phone="+91-97799-03785";
        $homePage->save();
    }
}
