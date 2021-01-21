<?php


namespace App\Repositories;


interface CustomerInterface
{
    /**
     * @param $input
     * @return mixed
     */
    public function create($input);

    /**
     * @return mixed
     */
    public function getAllCustomers();

    /**
     * @param $id
     * @return mixed
     */
    public function getCustomerById($id);
}
