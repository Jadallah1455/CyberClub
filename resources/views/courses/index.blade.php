<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script src="https://kit.fontawesome.com/770babbbde.js" crossorigin="anonymous"></script>
        <style>
            .card{
                display: inline-block;
            }
            .d-flex {
                justify-content: flex-start !important;
            }


        </style>
    </head>

    <body>
        <header>
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >Dropdown</a
                                >
                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownId"
                                >
                                    <a class="dropdown-item" href="#"
                                        >Action 1</a
                                    >
                                    <a class="dropdown-item" href="#"
                                        >Action 2</a
                                    >
                                </div>
                            </li>
                        </ul>
                        <form class="d-flex my-2 my-lg-0">
                            <input
                                class="form-control me-sm-2"
                                type="text"
                                placeholder="Search"
                            />
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

        </header>
        <main class=" mt-5">

            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Courses</h1>
                    <a href="{{route('courses.create')}}" class="btn btn-primary px-5"  style="display: inline-block; margin-left: auto" >Add New Course</a>
                </div>

                    @if (session('msg'))
                    <div class="alert alert-{{session('type')}} alert-dismissible fade show  d-flex justify-content-between align-items-center " role="alert">
                        <h5>{{session('msg')}}</h5>
                        <button type="button" data-bs-dismiss="alert" aria-label="Close"  class=" btn btn-close"></button>
                    </div>
                    @endif

                    @forelse ($courses as $course )
                    @php
                        $title = 'title_'.app()->currentLocale() ;
                        $description = 'description_'.app()->currentLocale() ;
                    @endphp
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('uploads/courses/'.$course->image)}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$course->$title}}</h5>
                            <p class="card-text">{{Str::words($course->$description, 6 ,'.....')}}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <form class="d-inline" action="{{route('courses.destroy' , $course->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
                                <a href="{{route('courses.edit',$course->id)}}" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                    @empty
                    <div class="alert alert-info"><h3>No Data Found....</h3></div>
                    @endforelse

                    <div class="d-grid gap-2 col-4 mx-auto mt-5">
                        <button class="btn btn-secondary mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"  aria-expanded="false" aria-controls="collapseExample">View All Courses</button>
                    </div>

                      <div class="collapse" id="collapseExample">
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('assets/img/coures 1.jpg')}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Some quick example text</h5>
                              <p class="card-text">Some quick text to build.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm mx-1"> <i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                              </div>
                        </div>
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('assets/img/coures 9.jpg')}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Some quick example text</h5>
                              <p class="card-text">Some quick text to build.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm mx-1"> <i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                              </div>
                        </div>
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('assets/img/coures 1.jpg')}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Some quick example text</h5>
                              <p class="card-text">Some quick text to build.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm mx-1"> <i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                              </div>
                        </div>
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('assets/img/coures 9.jpg')}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Some quick example text</h5>
                              <p class="card-text">Some quick text to build.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm mx-1"> <i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                              </div>
                        </div>
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('assets/img/coures 9.jpg')}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Some quick example text</h5>
                              <p class="card-text">Some quick text to build.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm mx-1"> <i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                              </div>
                        </div>
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('assets/img/coures 1.jpg')}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Some quick example text</h5>
                              <p class="card-text">Some quick text to build.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm mx-1"> <i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                              </div>
                        </div>
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('assets/img/coures 9.jpg')}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Some quick example text</h5>
                              <p class="card-text">Some quick text to build.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm mx-1"> <i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                              </div>
                        </div>
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('assets/img/coures 1.jpg')}}" height="120px"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Some quick example text</h5>
                              <p class="card-text">Some quick text to build.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm mx-1"> <i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm  mx-1"> <i class="fas fa-edit"></i></a>
                              </div>
                        </div>
                      </div>

            </div>

        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="{{asset('assets/770babbbde.js')}}"></script>
    </body>
</html>

