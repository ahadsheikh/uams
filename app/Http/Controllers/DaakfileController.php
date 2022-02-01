<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Daakfile;

class DaakfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Daakfiles = [];
        if(empty($request->all())){
            $Daakfiles = Daakfile::all();
        }else if(isset($request->owner) && isset($request->year) && isset($request->month)){
            $Daakfiles = Daakfile::where('owner', $request->owner)
                            ->whereBetween('upload_date', [$request->year.'-'.$request->month.'-01', $request->year.'-'.$request->month.'-31'])
                            ->get();
        }else if(isset($request->year) && isset($request->month)){
            $Daakfiles = Daakfile::whereBetween('upload_date', [$request->year.'-'.$request->month.'-01', $request->year.'-'.$request->month.'-31'])
                            ->get();
        }else{
            $error = [
                "message" => "The given daakfile was invalid. Valid query parameters are office, category, year, month",
                "error" => [
                    "owner(optional): string => owner of the file",
                    "year: number => The year of the Daakfiles created",
                    "month: number => The month of the Daakfiles created"
                ]
            ];
            return response()->json($error, 400);
        }
        return response()->json($Daakfiles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'string',
            'file' => 'required|file|mimes:pdf|max:10240',
            'upload_date' => 'required|date_format:Y-m-d',
            'message' => 'required|string',
            'owner' => 'required|string'
        ]);

        $file = $fields['file'];
        $fileName = $file->getClientOriginalName();
        $filePath = 'daakfiles/' . $fileName;
        $file->move(public_path('daakfiles'), $fileName);

        $daakfile = [];
        if(isset($fields['name'])){
            $daakfile = Daakfile::create([
                'name' => $fields['name'],
                'file' =>  $filePath,
                'upload_date' => $fields['upload_date'],
                'message' => $fields['message'],
                'owner' => $fields['owner']
            ]);
        }else{
            $fields['name'] = substr_replace($fields['file']->getClientOriginalName(), "", -4);
            $daakfile = Daakfile::create([
                'name' => substr($fileName, 0, -4),
                'file' =>  $filePath,
                'upload_date' => $fields['upload_date'],
                'message' => $fields['message'],
                'owner' => $fields['owner']        
            ]);
        }
        return response()->json($daakfile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $file = Daakfile::findOrFail($id);
        return response()->json($file);
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
        $fields = $request->validate([
            'name' => 'string',
            'upload_date' => 'date_format:Y-m-d',
            'message' => 'string',
            'owner' => 'string'
        ]);

        $file = Daakfile::findOrFail($id);

        $file->update($fields);
        return response()->json($file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Daakfile::findOrFail($id);
        $path = $file->file;
        Storage::delete($path);
        $file->delete();
        return response()->json(null, 204);
    }
}
