<?php

namespace App\Transformers;

use App\DTO\Customer\CustomerDTO;
use App\Models\Customer;
use App\Transformers\Base\BaseTransformer;

class CustomerTransformer extends BaseTransformer
{
    /**
     * @param CustomerDTO $customerDTO
     * @param Customer|null $customer
     * @return Customer
     */
    final public static function toCustomerEntity(CustomerDTO $customerDTO, ?Customer $customer = null): Customer
    {
        $customer = $customer ?? new Customer();
        $customer->setAttribute('first_name', $customerDTO->getFirstName());
        $customer->setAttribute('last_name', $customerDTO->getLastName());
        $customer->setAttribute('date_of_birth', $customerDTO->getDateOfBirth());
        $customer->setAttribute('phone_number', $customerDTO->getPhoneNumber());
        $customer->setAttribute('email', $customerDTO->getEmail());
        $customer->setAttribute('bank_account_number', $customerDTO->getBankAccountNumber());
        return $customer;
    }
}
