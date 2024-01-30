<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Event;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Course::with('user')->latest()->paginate(10);
    }

    public function list()
    {
      $courses = Course::all();
        return response()->json($courses);
    }

    public function event_list()
    {
      $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|string',
            'description'=> 'required|string|max:255',
        ]);

    

        $attr = [
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => $request->user_id,
        ];

        return Course::create($attr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with('user')->findOrFail($id);

        $details = [
            "title" => $course->title,
            "description" => $course->description,
            "created_by" => $course->user->name,
            "created_at" => date('Y-m-d', strtotime($course->created_at)),
            "events" => Event::where('course_id', $course->id)->get(),
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
    public function update(Request $request, Course $course)
    {
        $attr = [
            "title" => $request->title,
            "description" => $request->description
        ];

        $course->fill($attr)->save();
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
        $course = Course::findOrFail($id);
        $course->delete();
        Event::where("course_id", $id)->delete();
     
        return ['message'=>'Course has deleted', 'data_course'=>$course];
    }
}
