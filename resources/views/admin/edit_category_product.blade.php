@extends('admin_layout')
@section('admin_content')

<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                UPDATE CATEGORY PRODUCT
            </header>
            <div class="panel-body">
                <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo "<p style='color:red;text-align:left;'>$message</p>";
                        Session::put('message', null);
                    }
                    ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category-product')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea type="text" style="resize:none" rows="3" name="category_product_desc"
                                class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                        </div>
                       
                        <button type="submit" name="update_category_product" class="btn btn-info">Update Category</button>
                    </form>
                </div>
            </div>
        </section>

    </div>




    <!-- page end-->
</div>
@endsection