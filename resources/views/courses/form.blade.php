
<div class="row">
    <div class="col-md-6">
        <label for="name_ar" class="form-label">Arabic Course Name</label>
        <input type="text" name="course_title_ar" class="form-control" id="name_ar" placeholder="Arabic Course Name" required>
        @error('course_nam_ar')
            <small class="invalid-feedback">{{$message}}</small>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="name_en" class="form-label">English Course Name</label>
        <input type="text" name="course_title_en" class="form-control" id="name_en" placeholder="English Course Name" required>
        @error('course_nam_en')
            <small class="invalid-feedback">{{$message}}</small>
        @enderror
    </div>

    <div class="col-md-6 mt-3">
        <label for="ar_des" class="form-label">Arabic Course Description</label>
        <textarea name="ar_desc" class="form-control" id="ar_des" rows="5" placeholder="Enter the course description in Arabic here ...."></textarea>
    </div>
    <div class="col-md-6 mt-3">
        <label for="en_des" class="form-label">English Course Description</label>
        <textarea name="en_desc"  class="form-control" id="en_des" rows="5" placeholder="Enter the course description in English here ...."></textarea>
    </div>
    <div class="col-md-12 mt-3">
        <div class="mb-3">
            <label class=" d-block mb-2">Image</label>
            {{-- @if ($courses->image)
            <img class="mb-2" width ='100' src="{{asset('uploads/courses/'.$courses->image)}}"></img>
            @endif --}}

            <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">
            @error('image')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>

    {{-- <div class="col-md-6 mt-3">
            <select name="type" class="form-select" aria-label="Default select example">
                <option selected>Select The Course Category</option>
                <option value="university">university</option>
                <option value="external">external</option>
            </select>
    </div> --}}

    <div class="col-12 mt-3">
        <button class="btn btn-primary" type="submit">Add Course</button>
    </div>
</div>
