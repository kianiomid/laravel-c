<?php

namespace App\Services\Customer\Interfaces;

use App\DTO\Base\BaseListDTO;
use App\DTO\Customer\CustomerDTO;
use App\Exceptions\Base\BaseException;
use App\Exceptions\GeneralException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Throwable;

interface ICustomerService
{
    /**
     * @return BaseListDTO
     * @throws UnknownProperties
     */
    public function getAllWithPagination(): BaseListDTO;

    /**
     * @param CustomerDTO $customerDTO
     * @return CustomerDTO
     * @throws UnknownProperties
     */
    public function store(CustomerDTO $customerDTO): CustomerDTO;

    /**
     * @param int $id
     * @return CustomerDTO
     * @throws UnknownProperties
     * @throws BaseException
     */
    public function getById(int $id): CustomerDTO;

    /**
     * @param CustomerDTO $customerDTO
     * @param int $id
     * @return CustomerDTO
     * @throws UnknownProperties
     * @throws BaseException
     */
    public function updateById(CustomerDTO $customerDTO, int $id): CustomerDTO;

    /**
     * @param int $id
     * @return void
     * @throws GeneralException
     * @throws UnknownProperties
     * @throws Throwable
     */
    public function deleteById(int $id): void;
}
