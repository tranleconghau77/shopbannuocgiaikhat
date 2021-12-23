@extends('admin_layout')
@section('admin_content')

<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                UPDATE PRODUCT
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
                    <form role="form" action="{{URL::to('/update-product/'.$product->product_id)}}" method="POST"
                        enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" name="product_name" value="{{$product->product_name}}"
                                class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Content</label>
                            <textarea type="text" style="resize:none" rows="2" name="product_content"
                                class="form-control" id="exampleInputPassword1">{{$product->product_content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea type="text" style="resize:none" rows="2" name="product_desc" class="form-control"
                                id="exampleInputPassword1" placeholder="Password">{{$product->product_desc}}</textarea>

                        </div>
                        <div class=" form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                            <img src="backend/uploads/product/{{$product->product_image}}" alt="" width="70"
                                height="70">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select name="product_category" class="form-control input-sm m-bot15">
                                @foreach($all_category as $key=>$cate_pro)
                                <option value="{{$cate_pro->category_id}}">{{$cate_pro->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach($all_brand as $key=>$brand_pro)
                                <option value="{{$brand_pro->brand_id}}">{{$brand_pro->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="display:flex">
                            <div class="">
                                <label for="exampleInputPassword1">Price <span
                                        style="font-size:12px;">(VND)</span></label>
                                <input type="number" value="{{$product->product_price}}" name="product_price"
                                    class="form-control" id="exampleInputEmail1">
                            </div>
                            <div style="margin-left:30px">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input type="number" value="{{$product->product_quantity}}" name="product_quantity"
                                    class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Display</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hide</option>
                                <option value="1">Show</option>
                            </select>
                        </div>

                        <button type="submit" name="update_product" class="btn btn-info">Update Product</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
    <!-- page end-->
</div>
@endsection