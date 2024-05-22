<?php

namespace App\Providers\Customer;

use App\Repositories\Customer\Impls\CustomerRepository;
use App\Repositories\Customer\Interfaces\ICustomerRepository;
use App\Services\Customer\Impls\CustomerService;
use App\Services\Customer\Interfaces\ICustomerService;
use Illuminate\Support\ServiceProvider;

class CustomerProvider extends ServiceProvider
{
    /**
     * All the container singletons that should be registered.
     *
     * @var array
     */
    public array $singletons = [
        ICustomerService::class => CustomerService::class,
        ICustomerRepository::class => CustomerRepository::class,
    ];
}
