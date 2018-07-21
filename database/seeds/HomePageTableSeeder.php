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
        $homePage->office_name="Prof. G. S. SODHI";
        $homePage->office_position="Officer (Training & Placement)";
        $homePage->office_email="gssodhi@gndec.ac.in";
        $homePage->office_picture="sodhi.jpg";
        $homePage->office_phone="+919999999999";
        $homePage->about_address="Guru Nanak Dev Engineering College Gill Park Ludhiana 141006";
        $homePage->about_location="Ludhiana, Punjab, India ";
        $homePage->about_phone="+919915781209";
        $homePage->about_website="www.gndec.ac.in";
        $homePage->about_email="tpo@gndec.ac.in";
        $homePage->save();
    }
}
