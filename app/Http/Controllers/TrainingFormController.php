<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class TrainingFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {

        $input = (($request->all() == null) ? json_decode($request->getContent(), true) : $request->all());
        $pdf= new PDF;
        //Add page
        $pdf::SetTitle('Training Form');
        $pdf::AddPage();
        $width = $pdf::getPageWidth();
        $height = $pdf::getPageHeight();

        //Add header, footer and watermark
        $pdf::Image("images/training_form/watermark.png", 17.5, 50, $width - 35, $height - 90);
        $pdf::Image('images/training_form/header.png', 17.5, 10, $width - 35);
        $pdf::Image('images/training_form/footer.png', 12.5, $height - 40, $width - 25);
        $pdf::SetMargins(20, 0, 20);
        //Add Border
        $pdf::Rect(10, 10, $width - 20, $height - 20);

        //Writing text
        $pdf::SetFont('Helvetica', '', 10);
        $pdf::SetY(55);
        $pdf::Write(4.5, 'Ref.No. PTP/20');

        $pdf::SetXY($width - 55, 55);
        $pdf::Write(4.5, 'Dated: ' . date("d/m/Y"));

        $pdf::SetY(65);
        $pdf::Write(4.5, 'To');

        $pdf::SetY(70);
        $pdf::Write(4.5, $input['company']);

        $pdf::SetY(80);
        $pdf::SetFont('Helvetica', 'B', 9.6);
        $pdf::Write(4.5, "SUBJECT: REQUEST FOR INDUSTRIAL TRAINING OF B.TECH 7th/8th SEMESTER STUDENTS\n\n");

        $pdf::SetFont('Helvetica', '', 10);
        $pdf::Write(4.5, "Sir,\n\nGreetings from GNDEC, Ludhiana.\n\nGuru Nanak Dev Engineering College has emerged as one of the most prestigious engineering institute of North India over the 62 years of its inception and is conducting B.Tech. in seven disciplines as well as M.Tech.,MBA and PhD. for meeting the research requirement of technical field.");
        $pdf::Write(4.5, "\n\nSince practical training is equal in importance to theoretical foundation, the course curriculum is so designed that the students get exposure to practical aspects of their respective engineering branch. We are in a process of enrolling the final year students of our institute to various Industrial Organisations for");
        $pdf::SetFont('Helvetica', 'B', 10);
        $pdf::Write(4.5, " INDUSTRIAL TRAINING (6 MONTHS) ");
        $pdf::SetFont('Helvetica', '', 10);
        $pdf::Write(4.5, "which is an essential component of their four year B.Tech programme.\n\n");
        $pdf::SetFont('Helvetica', 'U', 10);
        $pdf::Write(4.5, "The programme will be as under:\n\n");

        $pdf::SetFont('Helvetica', '', 10);


        $html = "
            <ul>
                <li>To get familiar with the setup and working of the organisation. </li>
                <li> Preparation and submission of synopsis.Working on the given project- provided by the company.</li>
                <li>Submission of Mid Term and Final Report.</li>
                <li> Submission of Daily Diary at the end of training maintained & checked by the company representative.</li>
            </ul>";

        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::SetFont('Helvetica', 'B', 10);
        $pdf::Write(4.5, "\nWe recommend our graduating student Mr./Ms. ");

        $pdf::SetFont('HelveticaB', 'U', 10);
        $pdf::Write(4.6,  $input['name']);

        $pdf::SetFont('Helvetica', 'B', 10);
        $pdf::Write(4.5,  ", Roll no. ");

        $pdf::SetFont('HelveticaB', 'U', 10);
        $pdf::Write(4.6,  $input['urn']);

        $pdf::SetFont('Helvetica', 'B', 10);
        $pdf::Write(4.5, " of B.Tech (Branch) ");

        $pdf::SetFont('HelveticaB', 'U', 10);
        $pdf::Write(4.6, $input['branch']);

        $pdf::SetFont('Helvetica', 'B', 10);
        $pdf::Write(4.5, ", Email Id ");

        $pdf::SetFont('HelveticaB', 'U', 10);
        $pdf::Write(4.6,  $input['email']);

        $pdf::SetFont('Helvetica', 'B', 10);
        $pdf::Write(4.5,  ", Phone no. ");

        $pdf::SetFont('HelveticaB', 'U', 10);
        $pdf::Write(4.6,  $input['number']);

        $pdf::SetFont('Helvetica', 'B', 10);
        $pdf::Write(4.5,  " to undergo Industrial training in your esteemed organization starting from March 2020 .\n");
        $pdf::SetFont('Helvetica', '', 8);
        $pdf::Write(4, "(* Exact date of joining may be intimated at a later stage. An early and favourable response will be highly appreciated.)");

        $pdf::SetFont('Helvetica', '', 10);
        $pdf::Write(4.5, "\n\nWe would highly appreciate if the student can be accommodated for the training programme. Our students are sincere and hard working and we are sure that they will put in their best efforts during the training program. Looking for the confirmation from your side.\n\nYours Sincerely");
        $pdf::Write(4.5, "\n\n\nProf. G.S. Sodhi\nTraining & Placement Officer");
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return response()->download($pdf::Output(), 'Training.pdf', $headers);

    }
}
