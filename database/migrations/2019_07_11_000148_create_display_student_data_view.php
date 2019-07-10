
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
        
        previous_education.board_XII,
        previous_education.institute_XII,
        previous_education.month_XII,
        previous_education.year_XII,
        previous_education.obtained_marks_XII,
        previous_education.max_marks_XII,
        previous_education.percentage_XII,
        previous_education.jee_rank_XII,
        previous_education.institute_Diploma,
        previous_education.month_Diploma,
        previous_education.year_Diploma,
        previous_education.obtained_marks_Diploma,
        previous_education.max_marks_Diploma,
        previous_education.percentage_Diploma,
        previous_education.year_gap,

        detailed_semester_marks.obtained_marks_1  AS sem_obt_marks_1,
        detailed_semester_marks.credits_1,
        detailed_semester_marks.active_backlog_1,
        detailed_semester_marks.passive_backlog_1,

        detailed_semester_marks.obtained_marks_2  AS sem_obt_marks_2,
        detailed_semester_marks.credits_2,
        detailed_semester_marks.active_backlog_2,
        detailed_semester_marks.passive_backlog_2,

        detailed_semester_marks.obtained_marks_3  AS sem_obt_marks_3,
        detailed_semester_marks.credits_3,
        detailed_semester_marks.active_backlog_3,
        detailed_semester_marks.passive_backlog_3,

        detailed_semester_marks.obtained_marks_4  AS sem_obt_marks_4,
        detailed_semester_marks.credits_4,
        detailed_semester_marks.active_backlog_4,
        detailed_semester_marks.passive_backlog_4,

        detailed_semester_marks.obtained_marks_5 AS sem_obt_marks_5,
        detailed_semester_marks.credits_5,
        detailed_semester_marks.active_backlog_5,
        detailed_semester_marks.passive_backlog_5,

        detailed_semester_marks.obtained_marks_6  AS sem_obt_marks_6,
        detailed_semester_marks.credits_6,
        detailed_semester_marks.active_backlog_6,
        detailed_semester_marks.passive_backlog_6,

        detailed_semester_marks.obtained_marks_7  AS sem_obt_marks_7,
        detailed_semester_marks.credits_7,
        detailed_semester_marks.active_backlog_7,
        detailed_semester_marks.passive_backlog_7,

        detailed_semester_marks.obtained_marks_8  AS sem_obt_marks_8,
        detailed_semester_marks.credits_8,
        detailed_semester_marks.active_backlog_8,
        detailed_semester_marks.passive_backlog_8,

        detailed_semester_marks.sgpa_aggregate,
        detailed_semester_marks.percentage_aggregate,
        detailed_semester_marks.credits_aggregate,
        detailed_semester_marks.active_backlog_aggregate,
        detailed_semester_marks.passive_backlog_aggregate,
        detailed_semester_marks.verify_status

          FROM
          students
          JOIN users ON students.univ_roll_no = users.username AND users.type='STUDENT'
          JOIN previous_education ON students.univ_roll_no = previous_education.univ_roll_no
          JOIN detailed_semester_marks ON students.univ_roll_no = detailed_semester_marks.univ_roll_no
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
