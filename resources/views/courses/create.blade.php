
@extends('courses.master')
@section('title','Add New Category | '.env('APP_NAME'))
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Course</h1>

        <form action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('courses.form')

        </form>

    </div>


@stop
