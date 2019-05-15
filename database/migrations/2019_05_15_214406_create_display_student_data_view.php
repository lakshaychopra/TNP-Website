<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplayStudentDataView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW display_student 
        AS
        SELECT
        students.univ_roll_no,
        students.class_roll_no,
        students.name,
        students.whatsapp_cont,
        students.dob,
        students.batch,
        students.branch_type,
        students.stream,
        students.section,
        students.shift,
        students.training_semester,
        students.gender,
        students.blood_group,
        students.category,
        students.weight,
        students.height,
        students.living,
        students.father_name,
        students.father_phone,
        students.mother_name,
        students.mother_phone,
        students.address,
        students.city,
        students.district,
        students.state,
        students.pincode,
        students.mail_id,
        students.phone_number,
        users.sem_limit,
        metrics_education.board AS tenth_board,
        metrics_education.institute AS tenth_institue,
        metrics_education.month AS tenth_month,
        metrics_education.year AS tenth_year,
        metrics_education.obtained_marks AS tenth_obt_marks,
        metrics_education.max_marks AS tenth_max_marks,
        metrics_education.marks_type AS tenth_marks_type,
        metrics_education.percentage AS tenth_percentage,
        previous_education.board AS pre_edu_board,
        previous_education.institute AS pre_edu_institue,
        previous_education.month AS pre_edu_Month,
        previous_education.year AS pre_edu_year,
        previous_education.obtained_marks AS pre_edu_obt_marks,
        previous_education.max_marks AS pre_edu_max_marks,
        previous_education.percentage AS pre_edu_percentage,
        previous_education.education AS twelfth_or_diploma,
        previous_education.jee_rank,
        previous_education.year_gap,
        semester_marks.percentage AS sem_percent,
        semester_marks.active_backlog AS sem_active_backlog,
        semester_marks.passive_backlog AS sem_passive_backlog,
        semester_marks.marks_type AS sem_marks_type,
        semester_marks.obtained_marks  AS sem_obt_marks,
        semester_marks.max_marks  AS sem_max_marks,
        semester_marks.credits  AS sem_credits

          FROM
          students
          JOIN users ON students.univ_roll_no = users.username AND users.type='STUDENT'
          JOIN previous_education ON students.univ_roll_no = previous_education.univ_roll_no
          JOIN semester_marks ON students.univ_roll_no = semester_marks.univ_roll_no
          JOIN metrics_education  ON students.univ_roll_no = metrics_education.univ_roll_no;"
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('display_student');
    }
}
