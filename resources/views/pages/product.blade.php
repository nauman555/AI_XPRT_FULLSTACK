@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h4>Order Product Details </h4>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Customers</a></li>

        <li> <a href=" {{ redirect()->back()->getTargetUrl() }}">Orders</a> </li>

        <li class="active"> <a href="{{url()->current()}}">Product Details</a> </li>
    </ol>

    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <h2 class="name">
                    {{$productDetails->productName}}


                </h2>
                <hr>
                <h3><small>Product by <b>{{$productDetails->productVendor}}</b></small> </h3>
                <hr>
                <h3 class="price-container">
                    Price : {{$productDetails-> priceEach}}

                </h3>
                <div class="certified">
                    <ul>
                        <li><span>Quantity : <small> {{$productDetails->quantityOrdered}}</small> </span></li>
                        <li><span>Total Price :
                                {{ $productDetails->quantityOrdered * $productDetails-> priceEach }}</span></li>
                    </ul>
                </div>
                <hr>
                <div class="description description-tabs">
                    <ul id="myTab" class="nav nav-pills">
                        <li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Product
                                Description </a></li>
                        <li class=""><a href="#specifications" data-toggle="tab">Other Details</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="more-information">
                            <br>

                            <p>{{$productDetails->productDescription}} </p>
                        </div>
                        <div class="tab-pane fade" id="specifications">
                            <br>
                            <dl class="">
                                <dt>Product Scale</dt>
                                <dd>{{$productDetails->productScale}}</dd>


                            </dl>
                        </div>

                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
    <!-- end product -->
</div>
</div>
@endsection
