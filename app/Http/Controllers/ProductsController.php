<?php

namespace Fullstack\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * Return Each Order product details .
     *  @request  orderNumber
     * @return //Product details arrray to view
     */
    public function fetchProductDetails($orderNumber)
    {

        $productDetails = DB::table('orderdetails')->select('orderdetails.orderNumber', 'orderdetails.quantityOrdered', 'orderdetails.priceEach', 'products.productName', 'products.productScale',
            'products.productVendor', 'products.productDescription', 'products.buyPrice')
            ->leftJoin('products', 'orderdetails.productCode', '=', 'products.productCode')->where('orderdetails.orderNumber', '=', $orderNumber)->first();

        // return Response::json($productDetails);

        return view('pages.product')->with('productDetails', $productDetails);

    }
}