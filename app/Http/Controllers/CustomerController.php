<?php

namespace Fullstack\Http\Controllers;

use Fullstack\Models\Customer;
use Fullstack\Models\Product;

class CustomerController extends Controller
{
    /**
     * Return All Customers Data.
     *
     * @return //customers arrray to view
     */
    public function fetchCustomers()
    {
        $customers = Customer::sortable()->paginate(15);

        // fetch all product to show in placing order against selected customer

        $products = Product::all();

        return view('pages.customers', compact('customers', 'products'));

    }

}