@extends('admin_layout')
@section('admin_content')


<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Customer information
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Name Customer</th>
                        <th>Phone number</th>
                        <th>Gmail</th>
                        <th>Created at</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>{{$order_by_id[0]->customer_name}}</td>
                        <td>{{$order_by_id[0]->customer_phone}}</td>
                        <td>{{$order_by_id[0]->customer_email}}</td>
                        <td>{{$order_by_id[0]->customer_created_at}}</td>
                    </tr>

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


</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Shipping information
        </div>

        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Receiver Name </th>
                        <th>Phone number</th>
                        <th>Address</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>{{$order_by_id[0]->shipping_name}}</td>
                        <td>{{$order_by_id[0]->shipping_phone}}</td>
                        <td>{{$order_by_id[0]->shipping_address}}</td>
                        <td>{{$order_by_id[0]->shipping_created_at}}</td>

                    </tr>

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



</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Order Details
        </div>

        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total money</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_by_id as $key=>$value)
                    <tr>
                        <td>{{$value->product_name}}</td>
                        <td>{{$value->product_sales_quantity}}</td>
                        <td>{{$value->product_price}}</td>
                        <td>{{$value->order_total}}</td>
                        <td>{{$value->order_details_created_at}}</td>
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