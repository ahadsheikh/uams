<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = $request->user()->events;
        return response()->json($events);
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
            'title' => 'string|required',
            'description' => 'string|required',
            'start_time' => 'date_format:Y-m-d H:i:s|required',
            'end_time' => 'date_format:Y-m-d H:i:s|required'
        ]);
        $event = new Event($fields);
        $user = $request->user();
        $user->events()->save($event);

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $event = Event::findOrFail($id);
        if($request->user()->id == $event->user_id){
            return response()->json($event);
        }else{
            return response()->json(
                [
                    "error" => "Permission denied"
                ], 403
            );
        }
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
            'title' => 'string',
            'description' => 'string',
            'start_time' => 'date_format:Y-m-d H:i:s',
            'end_time' => 'date_format:Y-m-d H:i:s'
        ]);

        $event = Event::findOrFail($id);
        $user = $request->user();
        if($event->user_id == $user->id){
            $event->update($fields);
            return response()->json($event);
        }else{
            return response()->json(
                [
                    "error" => "Permission denied"
                ], 403
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $user = $request->user();
        if($event->user_id == $user->id){
            $event->delete();
            return response()->json(null, 204);
        }else{
            return response()->json(
                [
                    "error" => "Permission denied"
                ], 403
            );
        }
    }
}
