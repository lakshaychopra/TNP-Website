<?php

use Illuminate\Database\Seeder;
use App\Models\HomePage;

class HomePageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homePage = new HomePage;
        $homePage->office_type="OFFICE";
        $homePage->office_widget="T&P OFFICE";
        $homePage->office_name="Prof. G. S. SODHI";
        $homePage->office_position="Officer (Training & Placement)";
        $homePage->office_email="gagan_sodhi76@yahoo.com";
        $homePage->office_picture="sodhi.jpg";
        $homePage->office_phone="+91-98722-19178";
        $homePage->save();
    }
}