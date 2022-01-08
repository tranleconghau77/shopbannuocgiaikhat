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
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}"
                        method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" value="{{$edit_value->brand_name}}" name="brand_name"
                                class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea type="text" style="resize:none" rows="3" name="brand_desc" class="form-control"
                                id="exampleInputPassword1">{{$edit_value->brand_desc}}</textarea>
                        </div>

                        <button type="submit" name="update_brand_product" class="btn btn-info">Update
                            Brand</button>
                    </form>


                </div>
            </div>

        </section>

    </div>




    <!-- page end-->
</div>

@endsection