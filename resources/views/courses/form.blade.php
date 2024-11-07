
{{-- @php
 dd($course);
@endphp --}}

<div class="row">
    <div class="col-md-6">
        <label for="name_ar" class="form-label">Arabic Course Name</label>
        <input type="text" name="course_title_ar" class="form-control @error('course_title_ar') is-invalid @enderror" value="{{old('course_title_ar',$course->title_ar)}}" id="name_ar" placeholder="Arabic Course Name" required>
        @error('course_nam_ar')
            <small class="invalid-feedback">{{$message}}</small>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="name_en" class="form-label">English Course Name</label>
        <input type="text" name="course_title_en" class="form-control  @error('course_title_en') is-invalid @enderror" value="{{old('course_title_en',$course->title_en)}}" id="name_en" placeholder="English Course Name" required>
        @error('course_nam_en')
            <small class="invalid-feedback">{{$message}}</small>
        @enderror
    </div>

    <div class="col-md-6 mt-3">
        <label for="ar_des" class="form-label">Arabic Course Description</label>
        <textarea name="ar_desc" class="form-control @error('ar_desc') is-invalid @enderror"  id="ar_des" rows="5" placeholder="Enter the course description in Arabic here ....">{{old('ar_desc', $course->description_ar)}}</textarea>
    </div>
    <div class="col-md-6 mt-3">
        <label for="en_des" class="form-label">English Course Description</label>
        <textarea name="en_desc"  class="form-control @error('en_desc') is-invalid @enderror"  id="en_des" rows="5" placeholder="Enter the course description in English here ....">{{old('en_desc',$course->description_en)}}</textarea>
    </div>


    <div class="col-md-6 mt-3">
        <div class="mb-3">
            <label class="mb-2" for="type">Course Category</label>
            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                <option value="">Select Course Category</option>

                @foreach ($categories as $category )
                    <option  {{ $course->category_id == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->type}}</option>
                @endforeach
            </select>

            @error('type')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    {{-- <div class="col-md-6 mt-3">
            <select name="type" class="form-select" aria-label="Default select example">
                <option selected>Select The Course Category</option>
                <option value="1">university</option>
                <option value="2">external</option>
            </select>
    </div> --}}
    <div class="col-md-6 mt-3">
        <label for="level" class="mb-2">Select The Course Level</label>
        <select name="level" class="form-select" aria-label="Default select example" id="level">
            <option selected>Select The Course Level </option>
            <option value="1">Level 1 Part 1</option>
            <option value="2">Level 1 Part 2</option>
            <option value="3">Level 2 Part 1</option>
            <option value="4">Level 2 Part 2</option>
            <option value="5">Level 3 Part 1</option>
            <option value="6">Level 3 Part 2</option>
            <option value="7">Level 4 Part 1</option>
            <option value="8">Level 4 Part 2</option>
            <option value="9">Level 5 Part 1</option>
            <option value="10">Level 5 Part 2</option>
        </select>
    </div>
    <div class="col-md-12 ">
        <div class="mb-3">
            <label class=" d-block mb-2">Image</label>
            @if ($course->image)
            <img class="mb-2" width ='100' src="{{asset('uploads/courses/'.$course->image)}}"></img>
            @endif

            <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">
            @error('image')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>


</div>
