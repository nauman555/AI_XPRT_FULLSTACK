<?php

namespace Fullstack\Http\Controllers;

use Fullstack\Models\Order;
use Fullstack\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class OrdersController extends Controller
{

    /**
     * Return All Customer Orders .
     *  @request  customerNumber
     * @return //customers arrray to view
     */
    public function fetchCustomerOrders($customerNumber)
    {

        $orders = Order::where('customerNumber', '=', $customerNumber)->orderBy('orderNumber', 'asc')->paginate(15);

        return view('pages.orders')->with('orders', $orders);

    }

    /**
     * Place order against customer .
     *  @request  order details
     * @return // success or fail
     */

    public function placeCustomerOrder()
    {

        $orderDate = Input::get('orderDate');
        $requiredDate = Input::get('requiredDate');
        $shippedDate = Input::get('shippedDate');
        $status = Input::get('status');
        $comments = Input::get('comments');
        $customerNumber = Input::get('customernumber');
        $orderDate = Input::get('orderDate');

        $rndNumber = mt_rand(1000, 99999);
        //save order info
        $order = new Order();
        $order->orderNumber = $rndNumber;
        $order->orderDate = $orderDate;
        $order->requiredDate = $requiredDate;
        $order->shippedDate = $shippedDate;
        $order->status = $status;
        $order->comments = $comments;
        $order->customerNumber = $customerNumber;
        $order->orderDate = $orderDate;
        $order->save();

        // store order details info againt orderNumber

        $orderDetails = new OrderDetail();
        $orderDetails->orderNumber = $rndNumber;
        $orderDetails->productCode = Input::get('product');
        $orderDetails->quantityOrdered = Input::get('qurantity');
        $orderDetails->priceEach = Input::get('price');
        $orderDetails->save();

        $response_array = array('status' => 1, 'message' => 'Successfully Added');

        $response = Response::json($response_array);
        return $response;

    }
}