
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
  // public function up()
  // {
  //   DB::statement(
  //     "
  //     CREATE VIEW display_student 
  //     AS
  //     SELECT
  //     students.univ_roll_no,
  //     students.class_roll_no,
  //     students.first_name,
  //     students.last_name,
  //     students.whatsapp_cont,
  //     students.dob,
  //     students.batch,
  //     students.branch_type,
  //     students.stream,
  //     students.section,
  //     students.shift,
  //     students.training_semester,
  //     students.gender,
  //     students.category,
  //     students.living,
  //     students.father_name,
  //     students.father_phone,
  //     students.mother_name,
  //     students.mother_phone,
  //     students.blood_group,
  //     students.father_occupation,
  //     students.farming_background,
  //     students.address,
  //     students.city,
  //     students.district,
  //     students.height,
  //     students.weight,        
  //     students.state,
  //     students.pincode,
  //     students.mail_id,
  //     students.phone_number,
  //     students.graduation,
  //     students.spec_mba,
  //     students.spec_mtech,
  //     students.specialization,
  //     students.work_experience,
  //     students.passing_year,
  //     students.marks_type,
  //     students.CGPA,
  //     students.percentage,

  //     metrics_education.board AS tenth_board,
  //     metrics_education.institute AS tenth_institue,
  //     metrics_education.year AS tenth_year,
  //     metrics_education.obtained_marks AS tenth_obt_marks,
  //     metrics_education.max_marks AS tenth_max_marks,
  //     metrics_education.marks_type AS tenth_marks_type,
  //     metrics_education.percentage AS tenth_percentage,

  //     previous_education.education,
  //     previous_education.jee_rank,
  //     previous_education.XII_board,
  //     previous_education.XII_institute,
  //     previous_education.XII_year,
  //     previous_education.XII_obtained_marks,
  //     previous_education.XII_max_marks,
  //     previous_education.XII_percentage,
  //     previous_education.diploma_board,
  //     previous_education.diploma_institute,
  //     previous_education.diploma_year,
  //     previous_education.diploma_obtained_marks,
  //     previous_education.diploma_max_marks,
  //     previous_education.diploma_percentage,
  //     previous_education.year_gap,

  //     FROM
  //     students
  //     JOIN previous_education ON students.univ_roll_no = previous_education.univ_roll_no
  //     JOIN metrics_education  ON students.univ_roll_no = metrics_education.univ_roll_no;"
  //   );
  //   DB::statement("
  //       CREATE VIEW filtered_students 
  //       AS
  //       SELECT 
  //         students.univ_roll_no,
  //         students.class_roll_no,
  //         students.First_name,
  //         students.Last_name,
  //         students.dob,
  //         students.branch_type,
  //         students.stream,
  //         students.gender,
  //         users.email,
  //         users.phone_number,
  //         metrics_education.percentage AS TenthPercentage,
  //         previous_education.XII_percentage AS TwelthPercentage,
  //         previous_education.year_gap,
  //         semester_marks.percentage,
  //         semester_marks.active_backlog,
  //         semester_marks.passive_backlog
  //         FROM
  //         students
  //         JOIN users ON students.univ_roll_no = users.username AND users.type='STUDENT'
  //         JOIN previous_education ON students.univ_roll_no = previous_education.univ_roll_no
  //         JOIN semester_marks ON students.univ_roll_no = semester_marks.univ_roll_no
  //         JOIN metrics_education  ON students.univ_roll_no = metrics_education.univ_roll_no;
  //       ");
  // }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('display_student');
    Schema::dropIfExists('filtered_students');
  }
}
