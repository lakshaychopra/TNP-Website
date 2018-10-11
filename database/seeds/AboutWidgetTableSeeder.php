<?php

use Illuminate\Database\Seeder;
use App\Models\AboutWidget;

class AboutWidgetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutWidget = new AboutWidget;
        $aboutWidget->about_address="Guru Nanak Dev Engineering College Gill Park Ludhiana 141006";
        $aboutWidget->about_location="Ludhiana, Punjab, India";
        $aboutWidget->about_phone="0161–5064510";
        $aboutWidget->about_website="www.gndec.ac.in";
        $aboutWidget->about_email="tpo@gndec.ac.in";
        $aboutWidget->about_fax="+91-161-2501106";
        $aboutWidget->save();
    }
}
