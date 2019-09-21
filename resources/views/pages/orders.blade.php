@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h4>Customer Orders List </h4>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Customers</a></li>


        <li class="active"> <a href="{{url()->current()}}">Orders</a> </li>
    </ol>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>

                    <th>Order Number</th>
                    <th>Order Date</th>
                    <th>Required Date</th>
                    <th>Shipped Date</th>
                    <th>Status</th>
                    <th>Comments</th>
                    <th>Order Details </th>

                </tr>
            </thead>

            <tbody>
                @if($orders->count())
                @foreach ($orders as $key=> $order)

                <tr>
                    <td>{{$order->orderNumber}}</td>
                    <td>{{$order->orderDate}}</td>
                    <td>{{$order->requiredDate}}</td>
                    <td>{{$order->shippedDate}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->comments}}</td>
                    <td>

                        <a href="{{ url('/product/details', [$order->orderNumber]) }}"><i class="fafa-eye"></i> Veiw
                            Details
                        </a>
                    </td>

                </tr>

                @endforeach
                @else
                <div style="text-align:center; background-color: #ef8888;">
                    <span> No Order Yet !</span>
                </div>
                @endif
            </tbody>

        </table>
    </div>
    <div class="box-footer clearfix pull-right">
        <ul class="pagination pagination-sm no-margin pull-right">
            {{ $orders->links() }}

            {{-- {{ $users->appends(\Request::except('page'))->render() }} --}}
        </ul>
    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
