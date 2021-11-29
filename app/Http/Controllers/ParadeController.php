<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;
use App\Models\ParadeState;
use PhpParser\Node\Expr\Cast\Array_;

class ParadeController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date;
        $data = Array();
        if(isset($date)){
            $total = ParadeState::where('date', $date)->where('table_type', 'total')->get();
            $active = ParadeState::where('date', $date)->where('table_type', 'active')->get();
            $present = ParadeState::where('date', $date)->where('table_type', 'present')->get();
            $absent = Absence::where('date', $date)->get();
            $data = [
                'status' => true,
                'message' => 'Showing datas filter by date',
                'date' => $date,
                'total' => $total,
                'active' => $active,
                'present' => $present,
                'absent' => $absent
            ];
        }else{
            $data['statue'] = false;
            $data['message'] = 'Date parameter required.';
        }
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $fields = request()->validate([
            'date' => 'required|date_format:Y-m-d',
            'total' => 'required|array',
            'active' => 'required|array',
            'present' => 'required|array',
            'course_of_presence' => 'required|array'
        ]);

        $date = $fields['date'];
        $n = ParadeState::where('date', $date)->count();
        if($n > 0){
            return response()->json(['status' => false, 'message' => 'Parade already exists for this date'], 400);
        }

        $data = Array();
        $data['status'] = true;
        $data['date'] = $fields['date'];

        $total = Array();
        foreach($fields['total'] as $row){
            $row['date'] = $fields['date'];
            $row['table_type'] = 'total';
            $r = ParadeState::create($row);  

            unset($r['date']);
            unset($r['table_type']);
            array_push($total, $r);
        }
        $data['total'] = $total;

        $active = Array();
        foreach($fields['active'] as $row){
            $row['date'] = $fields['date'];
            $row['table_type'] = 'total';
            $r = ParadeState::create($row);  

            unset($r['date']);
            unset($r['table_type']);
            array_push($active, $r);
        }
        $data['active'] = $active;

        $present = Array();
        foreach($fields['present'] as $row){
            $row['date'] = $fields['date'];
            $row['table_type'] = 'total';
            $r = ParadeState::create($row);  

            unset($r['date']);
            unset($r['table_type']);
            array_push($present, $r);
        }
        $data['present'] = $present;

        $course_of_presence = Array();
        foreach($fields['course_of_presence'] as $row){
            $row['date'] = $fields['date'];
            $r = Absence::create($row);  

            unset($r['date']);
            array_push($course_of_presence, $r);
        }
        $data['course_of_presence'] = $course_of_presence;

        return response()->json($data);
    }        

    public function remove_by_date(Request $request)
    {
        $date = $request->date;
        if(isset($date)){
            ParadeState::where('date', $date)->delete();
            Absence::where('date', $date)->delete();
            $data['statue'] = true;
            $data['message'] = "All parade data is deleted in date $date";
        }else{
            $data['statue'] = false;
            $data['message'] = 'Date parameter required. Data is not deleted';
        }
        return response()->json($data, 200);
    }
}
