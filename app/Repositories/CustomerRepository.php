<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Interfaces\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAllCustomers()
    {
        return Customer::all();
    }

    public function createCustomer(array $data)
    {
        return Customer::create($data);
    }

    public function updateCustomer($id, array $data)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($data);

        return $customer;
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->tokens()->count() > 0) {
            $customer->tokens()->delete();
        }

        return $customer->delete();
    }
}
