<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $files = [];
        if(empty($request->all())){
            $files = File::all();
        }else if(isset($request->office) && isset($request->category) && isset($request->year) && isset($request->month)){
            $work_id = Work::where('title', $request->category)
                            ->where('type', $request->office)->first()->id;
            $files = File::where('work_id', $work_id)
                            ->whereBetween('upload_date', [$request->year.'-'.$request->month.'-01', $request->year.'-'.$request->month.'-31'])
                            ->get();
        }else{
            $error = [
                "message" => "The given data was invalid. Valid query parameters are office, category, year, month",
                "error" => [
                    "office: string => The office name",
                    "category: string => The office work category title",
                    "year: number => The year of the files created",
                    "month: number => The month of the files created"
                ]
            ];
            return response()->json($error, 400);
        }
        return response()->json($files);
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
            'work_id' => 'required|integer'
        ]);

        $work = Work::findOrFail($fields['work_id']);
        $file = $fields['file'];
        $fileName = $file->getClientOriginalName();
        $filePath = 'officefiles/' . $fileName;
        $file->move(public_path('officefiles'), $fileName);

        $data = [];
        if(isset($fields['name'])){
            $data = $work->files()->create([
                'name' => $fields['name'],
                'file' =>  $filePath,
                'upload_date' => $fields['upload_date']
            ]);
        }else{
            $fields['name'] = substr_replace($fields['file']->getClientOriginalName(), "", -4);
            $data = $work->files()->create([
                'name' => $fields['name'],
                'file' =>  $filePath,
                'upload_date' => $fields['upload_date']            
            ]);
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {   
        return response()->json($file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $fields = $request->validate([
            'name' => 'string',
            'upload_date' => 'date_format:Y-m-d',
        ]);

        $file->update($fields);
        return response()->json($file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $path = $file->file;
        Storage::delete($path);
        //Storage::delete(public_path().$path);
        $file->delete();
        return response()->json(null, 204);
    }

    // public function download($id){
    //     $file = File::findOrFail($id);
    //     $headers = array(
    //           'Content-Type: application/pdf',
    //         );

    //     return response()->download($file->file, $file->name.'.pdf', $headers);
    // }
}
