<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest('id');
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = new Course();
        return view('courses.create',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validare
        $request->validate([
            'course_title_ar'=>'required',
            'course_title_en'=>'required',
            'en_desc'=>'required',
            'ar_desc'=>'required',
            'image'=>'required|image|mimes:png,jpg',
        ]);

        // dd($request->all());

        //uploads file
        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/courses/'),$img_name);

        //store to database
        // dd($request->all());
        Course::create([
            'title_ar'=> $request->course_title_ar ,
            'title_en'=> $request->course_title_en ,
            'description_en'=> $request->en_desc ,
            'description_ar'=> $request->ar_desc ,
            'category_id' => '1',
            'image'=>$img_name,
        ]);

        //redirect

        return redirect()->route('courses.index')->with('msg','Course Add Successfully')->with('type','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
