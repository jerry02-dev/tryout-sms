<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Event::with('user')->with('course')->latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'description'=> 'required|string|max:255',
            'course' => 'required',
        ]);

        $val = implode(",", $request->course);
        $fval = explode(",", $val);

        $attr = [
            'name' => $request->name,
            'description' => $request->description,
            'course_id' =>  $fval[0],
            'created_by' => $request->user_id,
        ];

        return Event::create($attr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Event::with('user')->with('course')->findOrFail($id);

        $details = [
            "name" => $course->name,
            "description" => $course->description,
            "course" => $course->course->title,
            "created_by" => $course->user->name,
            "created_at" => date('Y-m-d', strtotime($course->created_at)),
        ];

        return $details;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $attr = [
            "name" => $request->name,
            "description" => $request->description
        ];

        $event->fill($attr)->save();


        return response()->json([
            'message'=>'Updated Successfully!!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
     
        return ['message'=>'Event has deleted', 'data_event'=>$event];
    }
}
