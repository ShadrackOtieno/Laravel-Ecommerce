<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }
    </style>
    @include('admin.css')
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


                    
                    <div class="div_center">


                        <h1 class="font_size">ADD PRODUCT</h1>
                        <form action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="div_design">
                                <label>Product Title:</label>
                                <input class="text_color" type="text" name="title" placeholder="Write a title"
                                    required>
                            </div>

                            <div class="div_design">
                                <label>Product Description:</label>
                                <input class="text_color" type="text" name="description"
                                    placeholder="Write description" required>
                            </div>

                            <div class="div_design">
                                <label>Product Price:</label>
                                <input class="text_color" type="number" name="price" required>
                            </div>


                            <div class="div_design">
                                <label>Discount Price:</label>
                                <input class="text_color" type="number" name="dis_price">
                            </div>


                            <div class="div_design">
                                <label>Product Quantity:</label>
                                <input class="text_color" type="number" name="quantity" min="0"
                                    placeholder="Write a title" required>
                            </div>


                            <div class="div_design">
                                <label>Product Category:</label>
                                <select class="text_color" name="category" required>
                                    <option value="selected">Add Category</option>
                                    @foreach ($category as $category)
                                     <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

                                    @endforeach

                                </select>
                            </div>


                            <div class="div_design">
                                <label>Product Image:</label>
                                <input class="text_color" type="file" name="image" placeholder="Write a title"
                                    required>
                            </div>
                            <div class="div_design">
                                <input type="submit" value="Add Product" class="btn btn-primary">


                            </div>

                        </form>









                    </div>



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
