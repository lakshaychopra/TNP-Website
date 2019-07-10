<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StudentEntries;

class FilterController extends Controller 
{

    public function getUsers(Request $request) {
        if ( $request->input('showdata') ) {
            return StudentEntries::orderBy('created_at', 'desc')->get();
        }
    $columns = [
        'name', 'univ_roll_no', 'branch_type'
];
    $length = $request->input('length');
    $column = $request->input('column');
    $search_input = $request->input('search');
    $query = StudentEntries::select('name', 'univ_roll_no', 'branch_type')->orderBy($columns[$column]);

    if ($search_input) {
        $query->where(function($query) use ($search_input) {
        $query->where('name', 'like', '%' . $search_input . '%')->orWhere('univ_roll_no', 'like', '%' . $search_input . '%')
        ->orWhere('branch_type', 'like', '%' . $search_input . '%');
    });
  }
    $users = $query->paginate($length);
    return ['data' => $users];
}
public function deleteUser(DisplayStudent $user) {
    if($user) {
        $user->delete();
    }
    return 'user deleted';
}
}