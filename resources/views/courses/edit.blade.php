
@extends('courses.master')
@section('title','Edit Course | '.env('APP_NAME'))
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Course</h1>
            <a href="{{route('courses.index')}}" class="btn btn-dark px-5"  style="display: inline-block; margin-left: auto" ><i class="fas fa-arrow-left"></i> ALL Posts</a>
        </div>

        <form action="{{route('courses.update',$course->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('courses.form')

            <div class="col-12 mt-3">
                <button class="btn btn-success px-5" type="submit">Edit</button>
            </div>

        </form>

    </div>


@stop
