<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @include('admin.css')
    <style>
        .div_Center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and
                                more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @if (session()->has('message'))
                        <div class="alert alert-success">

                            {{ session()->get('message') }}

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                        </div>
                    @endif

                    <div class="div_Center">
                        <h2 class="h2_font">ADD CATEGORY</h2>

                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <input type="text" name="category" placeholder="Write the category name"
                                style="color: blue">
                            <input type="submit" class="btn btn-primary" name="submit" value="ADD CATEGORY">
                        </form>
                    </div>

                    <table class="center">
                        <tr>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->category_name }}</td>
                                <td>
                                    <a onclick="return confirm('Are you sure to delete this?')" href="{{ url('delete_category',$data->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')

</body>

</html>
