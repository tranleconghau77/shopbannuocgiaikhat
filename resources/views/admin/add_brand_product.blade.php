@extends('admin_layout')
@section('admin_content')

<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                ADD BRAND PRODUCT
            </header>
            <div class="panel-body">
                <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo "<p class='position-center' style='color:red;text-align:left;'>$message</p>";
                        Session::put('message', null);
                    }
                    ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-brand-product')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea type="text" style="resize:none" rows="3" name="brand_desc" class="form-control"
                                id="exampleInputPassword1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Display</label>
                            <select name="brand_status" class="form-control input-sm m-bot15">
                                <option value="0">Hide</option>
                                <option value="1">Show</option>
                            </select>
                        </div>

                        <button type="submit" name="add_brand_product" class="btn btn-info">Add Brand</button>
                    </form>
                </div>
            </div>
        </section>

    </div>




    <!-- page end-->
</div>
@endsection