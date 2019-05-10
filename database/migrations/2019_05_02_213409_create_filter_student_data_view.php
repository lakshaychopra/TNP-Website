

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterStudentDataView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW filtered_students 
        AS
        SELECT 
          students.univ_roll_no,
          students.class_roll_no,
          students.name,
          students.dob,
          students.branch_type,
          students.stream,
          students.gender,
          users.email,
          users.phone_number,
          metrics_education.percentage AS TenthPercentage,
          previous_education.percentage AS TwelthPercentage,
          previous_education.year_gap,
          semester_marks.percentage,
          semester_marks.active_backlog,
          semester_marks.passive_backlog
          FROM
          students
          JOIN users ON students.univ_roll_no = users.username AND users.type='STUDENT'
          JOIN previous_education ON students.univ_roll_no = previous_education.univ_roll_no
          JOIN semester_marks ON students.univ_roll_no = semester_marks.univ_roll_no
          JOIN metrics_education  ON students.univ_roll_no = metrics_education.univ_roll_no;



        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
