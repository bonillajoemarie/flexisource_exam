<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerInterface;
use App\Repositories\CustomerRepositories;

class CustomerController extends Controller
{
    /**
     * @var CustomerInterface
     */
    private $customer;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CustomerRepositories $customer)
    {
        $this->customer = $customer;
    }

    public function getAllCustomers()
    {
        return $this->customer->getAllCustomers();
    }

    public function getCustomerById($id)
    {
        return $this->customer->getCustomerById($id);
    }
}
