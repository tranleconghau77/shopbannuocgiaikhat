@extends('admin_layout')
@section('admin_content')


<!-- page start-->
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            List Product
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <h3 style="margin-left:40px">E-DRINK</h3>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form>
                    {{csrf_field()}}
                    <div class="input-group">
                        <input name="keywords" type="text" class="input-sm form-control search-keywords" placeholder="">
                        <span class="input-group-btn">
                            <button class="search-button-manager btn btn-sm btn-default" data-id_search=3
                                type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <i class="fas fa-list"></i>
                        </th>
                        <th>Name Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Display</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $message = Session::get('message');
                    
                    if ($message) {
                        echo "<p style='color:red;text-align:left;margin-left:12px;'>$message</p>";
                        Session::put('message', null);
                    }
                    ?>
                    @foreach($all_product as $key=>$product)
                    <tr>
                        <td><i class="fas fa-circle" style="font-size:8px"></i></label>
                            </label>
                        </td>
                        <td>{{$product->product_name}}</td>
                        <td><span class="text-ellipsis">{{$product->product_price}}</span></td>

                        <td><span class="text-ellipsis"><img
                                    src="{{url('backend/uploads/product', $product->product_image)}}" alt="" width="50"
                                    height="50"></span></td>
                        <td><span class="text-ellipsis">{{$product->category_name}}</span></td>
                        <td><span class="text-ellipsis">{{$product->brand_name}}</span></td>
                        <td><span class="text-ellipsis">
                                <?php
                                    if ($product->product_status == 0) {
                                        ?>
                                <a href="{{URL::to('/active-product-status/'.$product->product_id)}}"><i
                                        class='fas fa-eye-slash'></i></a>

                                <?php
                                    } 
                                    else {
                                        ?>
                                <a href="{{URL::to('/unactive-product-status/'.$product->product_id)}}">
                                    <i class='fas fa-eye'></i></a>
                                <?php
                                        }
                                        ?>

                            </span></td>
                        <td>
                            <a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="active"
                                ui-toggle-class="">
                                <i class="fas fa-pen-square text-success text-active"></i></a>
                            <a onclick="return confirm('Do you want to delete this product')"
                                href="{{URL::to('/delete-product/'.$product->product_id)}}"
                                class="active delete-product" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <!-- page end-->
</div>
@endsection