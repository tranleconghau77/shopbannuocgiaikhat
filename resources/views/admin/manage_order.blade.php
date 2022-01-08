@extends('admin_layout')
@section('admin_content')


<!-- page start-->
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            List Order
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Name Customer</th>
                        <th>Total Money</th>
                        <th>Status</th>
                        <th>Options</th>
                        <th>Created at</th>
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
                    @foreach($all_order as $key=>$v_order)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td>{{$v_order->customer_name}}</td>
                        <td>{{number_format($v_order->order_total)}}</td>
                        <td>{{$v_order->order_status}}</td>
                        <td>
                            <a href="{{URL::to('/view-order/'.$v_order->order_id)}}" class="active" ui-toggle-class="">
                                <i class="fas fa-pen-square text-success text-active"></i></a>
                            <a onclick="return confirm('Do you want to delete this order')"
                                href="{{URL::to('/delete-order/'.$v_order->order_id)}}" class="active delete-order"
                                ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                        <td><span class="text-ellipsis">{{$v_order->order_created_at}}</span></td>
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