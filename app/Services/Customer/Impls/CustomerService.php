<?php

namespace App\Services\Customer\Impls;

use App\DTO\Base\BaseListDTO;
use App\DTO\Customer\CustomerDTO;
use App\Exceptions\Base\BaseException;
use App\Exceptions\GeneralException;
use App\Models\Customer;
use App\Repositories\Customer\Interfaces\ICustomerRepository;
use App\Services\Customer\Interfaces\ICustomerService;
use App\Transformers\Base\BaseTransformer;
use App\Transformers\CustomerTransformer;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CustomerService implements ICustomerService
{
    /**
     * @param ICustomerRepository $customerRepository
     */
    public function __construct(
        private readonly ICustomerRepository $customerRepository,
    )
    {
        //
    }

    /**
     * @return BaseListDTO
     * @throws UnknownProperties
     */
    public function getAllWithPagination(): BaseListDTO
    {
        $customers = $this->customerRepository->paginate();
        return BaseTransformer::toBaseListDTO(lengthAwarePaginator: $customers, caster: CustomerDTO::class);
    }

    /**
     * @param CustomerDTO $customerDTO
     * @return CustomerDTO
     * @throws UnknownProperties
     */
    public function store(CustomerDTO $customerDTO): CustomerDTO
    {
        $customer = CustomerTransformer::toCustomerEntity($customerDTO);
        $customer = $this->customerRepository->create($customer);
        return new CustomerDTO($customer->toArray());
    }

    /**
     * @param int $id
     * @return CustomerDTO
     * @throws GeneralException
     * @throws UnknownProperties
     */
    public function getById(int $id): CustomerDTO
    {
        $customer = $this->customerRepository->findById(id: $id);
        if (!$customer instanceof Customer) {
            throw new GeneralException(exceptionErrorCode: BaseException::NOT_FOUND_ERROR);
        }

        return new CustomerDTO($customer->toArray());
    }

    /**
     * @param CustomerDTO $customerDTO
     * @param int $id
     * @return CustomerDTO
     * @throws GeneralException
     * @throws UnknownProperties
     */
    public function updateById(CustomerDTO $customerDTO, int $id): CustomerDTO
    {
        $customer = $this->customerRepository->findById(id: $id);
        if (!$customer instanceof Customer) {
            throw new GeneralException(exceptionErrorCode: BaseException::NOT_FOUND_ERROR);
        }

        $customer = CustomerTransformer::toCustomerEntity($customerDTO, $customer);
        $customer = $this->customerRepository->update($customer);
        return new CustomerDTO($customer->toArray());
    }

    /**
     * @param int $id
     * @return void
     * @throws GeneralException
     */
    public function deleteById(int $id): void
    {
        $customer = $this->customerRepository->findById(id: $id);
        if (!$customer instanceof Customer) {
            throw new GeneralException(exceptionErrorCode: BaseException::NOT_FOUND_ERROR);
        }
        $this->customerRepository->delete($customer);
    }
}
