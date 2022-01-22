<?php

namespace App\Http\Controllers;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return response()->json($works);
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
            'title' => 'required|string',
            'type' => 'required|string'
        ]);
        $works = Work::where('title', $fields['title'])->where('type', $fields['type'])->get();
        if(count($works) > 0){
            $error = [
                "message" => "The given data was invalid.",
                "error" => [
                    "Same category in the office already exists"
                ]
            ];
            return response()->json($error, 400);
        }

        $work = Work::create($fields);
        return response()->json($work);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return response()->json($work);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $fields = $request->validate([
            'title' => 'string',
            'type' => 'string'
        ]);

        $work->update($fields);
        return response()->json($work);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return response()->json(null, 204);
    }
}
