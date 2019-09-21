@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h4>Customer Details </h4>

    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@sortablelink('customerName','Customer Name')</th>
                    <th>@sortablelink('contactLastName','FirstName')</th>
                    <th>@sortablelink('contactLastName','LastName')</th>
                    <th>@sortablelink('phone','Phone')</th>
                    <th>@sortablelink('addressLine1','Address')</th>
                    <th>@sortablelink('city','City')</th>
                    <th>@sortablelink('state','State')</th>
                    <th>@sortablelink('postalCode','PostalCode')</th>
                    <th>@sortablelink('country','Country')</th>
                    <th>@sortablelink('creditLimit','Credit Limit')</th>

                    <th>Orders</th>
                    <th>Place Order</th>
                </tr>
            </thead>
            @if($customers->count())
            <tbody>
                @foreach ($customers as $key=> $customer)

                <tr>
                    <td>{{$customer->customerNumber}}</td>
                    <td>{{$customer->customerName}}</td>
                    <td>{{$customer->contactFirstName}}</td>
                    <td>{{$customer->contactLastName}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->addressLine1}} {{$customer->addressLine2}}</td>
                    <td>{{$customer->city}}</td>
                    <td>{{$customer->state}}</td>
                    <td>{{$customer->postalCode}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->creditLimit}}</td>

                    <td>

                        <a href="{{ url('/customer/orders', [$customer->customerNumber]) }}"><i
                                class="fa fa-external-link"></i>
                        </a>
                    </td>
                    <td> <span data-customernumber="{{ $customer->customerNumber }}" style="cursor:pointer"> <i
                                class="fa fa-shopping-cart set-place-order-details" data-toggle="modal"
                                data-target="#placeorderModal"
                                data-customernumber="{{ $customer->customerNumber }}"></i></span> </td>

                </tr>

                @endforeach
            </tbody>
            @endif
        </table>
        <div class="box-footer clearfix pull-right">
            <ul class="pagination pagination-sm no-margin pull-right">
                {{ $customers->links() }}

                {{-- {{ $users->appends(\Request::except('page'))->render() }} --}}
            </ul>
        </div>
    </div>


</div>




<div class="modal fade" id="placeorderModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Place Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="place_order_form">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-lg-offset-1">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="orderDate">Order Date</label>
                                    <input type="date" required class="form-control" id="orderDate">
                                    <input type="hidden" id="customernumber">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="requiredDate">Required Date</label>
                                    <input type="date" required class="form-control" id="requiredDate">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="shippedDate">Shipped Date</label>
                                    <input type="date" class="form-control" required id="shippedDate">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <input type="text" required class="form-control" id="status"
                                        placeholder="Shipped / Not Shipped">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <input type="text" required class="form-control" id="comments"
                                    placeholder="Order Comment">
                            </div>
                            <div class="form-group">
                                <label for="product">Select Product</label>
                                <select id="product" required class="form-control">

                                    <option selected>Choose Product</option>
                                    @foreach ($products as $key=> $product)

                                    <option value="{{$product->productCode}}">{{$product->productName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="qurantity">Quantity</label>
                                    <input type="number" required class="form-control" id="qurantity">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="price">Price Each</label>
                                    <input type="text" required class="form-control" id="price">
                                </div>

                            </div>



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
@endsection
