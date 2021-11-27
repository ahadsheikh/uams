<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParadeState;

class ParadeStateController extends Controller
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
        $type = $request->type;
        $datas = [];
        if(isset($company) && isset($date) && isset($type)){
            $datas = ParadeState::where('company', $company)->where('date', $date)->where('table_type', $type)->get();
        }else if(!isset($company) && isset($date) && isset($type)){
            $datas = ParadeState::where('date', $date)->where('table_type', $type)->get();
        }
        else{
            $datas = ParadeState::all();
        }
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
            'table_type' => 'required|string',
            'officer' => 'integer',
            'master_warent_officer' => 'integer',
            'senior_warent_officer' => 'integer',
            'warent_officer' => 'integer',
            'sergent' => 'integer',
            'corporal' => 'integer',
            'lance_corporal' => 'integer',
            'soldier' => 'integer',
            'clerk' => 'integer',
            'cook_u' => 'integer',
            'cook_mess' => 'integer',
            'trademan' => 'integer',
            'nc_e' => 'integer',
            'nc_u' => 'integer',
            'songjukto' => 'integer',
            'rt' => 'integer',
        ]);

        $data = ParadeState::create($fields);
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
        $data = ParadeState::findOrFail($id);
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
            'table_type' => 'string',
            'officer' => 'integer',
            'master_warent_officer' => 'integer',
            'senior_warent_officer' => 'integer',
            'warent_officer' => 'integer',
            'sergent' => 'integer',
            'corporal' => 'integer',
            'lance_corporal' => 'integer',
            'soldier' => 'integer',
            'clerk' => 'integer',
            'cook_u' => 'integer',
            'cook_mess' => 'integer',
            'trademan' => 'integer',
            'nc_e' => 'integer',
            'nc_u' => 'integer',
            'songjukto' => 'integer',
            'rt' => 'integer',
        ]);

        $data = ParadeState::findOrFail($id);
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
        $data = ParadeState::findOrFail($id);
        $data->delete();
        return response()->json(null, 204);
    }
}    