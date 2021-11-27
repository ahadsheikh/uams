<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $company = $request->company;
        $date = $request->date;
        $datas = [];
        if(isset($company) && isset($date)){
            $datas = Absence::where('company', $company)->where('date', $date)->get();
        }else if(!isset($company) && isset($date)){
            $datas = Absence::where('date', $date)->get();
        }
        else{
            $datas = Absence::all();
        }
        $datas = Absence::all();
        return response()->json($datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = request()->validate([
            'company' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'yearly' => 'integer',
            'temporary' => 'integer',
            'entertainment' => 'integer',
            'doctoral' => 'integer',
            'joining' => 'integer',
            'weekly' => 'integer',
            'course' => 'integer',
            'cadre' => 'integer',
            'join' => 'integer',
            'command' => 'integer',
            'hospital' => 'integer',
            'osl' => 'integer',
            'awl' => 'integer',
            'dimb' => 'integer',
            'accommodation' => 'integer',            
        ]);

        $data = Absence::create($fields);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Absence::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields = request()->validate([
            'company' => 'string',
            'date' => 'date_format:Y-m-d',
            'yearly' => 'integer',
            'temporary' => 'integer',
            'entertainment' => 'integer',
            'doctoral' => 'integer',
            'joining' => 'integer',
            'weekly' => 'integer',
            'course' => 'integer',
            'cadre' => 'integer',
            'join' => 'integer',
            'command' => 'integer',
            'hospital' => 'integer',
            'osl' => 'integer',
            'awl' => 'integer',
            'dimb' => 'integer',
            'accommodation' => 'integer',            
        ]);

        $data = Absence::findOrFail($id);
        $data->update($fields);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Absence::findOrFail($id);
        $data->delete();
        return response()->json(null, 204);
    }
}
