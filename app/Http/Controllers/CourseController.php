<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'DESC')->get(); // Collection object
        // dd($courses);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = new Course();
        $categories = CourseCategory::all();
        // dd($categories);
        return view('courses.create',compact('course','categories'));
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
            'level'=>'required',
            'type'=>'required',
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
            'level'=> $request->level ,
            'category_id' => $request->type,
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
        // $course = Course::findOrFail($id);
        $categories = CourseCategory::all();
        return view('courses.edit' , compact('course','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        //validare
        $request->validate([
            'course_title_ar'=>'required',
            'course_title_en'=>'required',
            'en_desc'=>'required',
            'ar_desc'=>'required',
            'level'=>'required',
            'type'=>'required',
            'image'=>'nullable|image|mimes:png,jpg',
        ]);

        //uploads file
            $img_name = $course->image;
            if($request->hasFile('image')){
        // dd('done');
          //delet old image
          File::delete(public_path('uploads/courses/'.$img_name));
          $img_name = rand().time().$request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/courses/'),$img_name);
      }

        //Add Data to Databas
        $course->update([
            'title_ar'=> $request->course_title_ar ,
            'title_en'=> $request->course_title_en ,
            'description_en'=> $request->en_desc ,
            'description_ar'=> $request->ar_desc ,
            'level'=> $request->level ,
            'category_id' => $request->type,
            'image'=>$img_name,
        ]);


        //redirect


        return redirect()->route('courses.index')->with('msg','Course Updated Successfully')->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        File::delete(public_path('uploads/courses/'.$course->image));
        Course::destroy($course->id);

        return redirect()->route('courses.index')->with('msg','Course deleted Successfully')->with('type','danger');
    }
}
