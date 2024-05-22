<?php

namespace App\Http\Controllers\API\V1;

use App\DTO\Customer\CustomerDTO;
use App\Exceptions\Base\BaseException;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\CustomerSaveRequest;
use App\Models\Customer;
use App\Services\Customer\Interfaces\ICustomerService;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CustomerController extends Controller
{
    /**
     * @param ICustomerService $customerService
     */
    public function __construct(private readonly ICustomerService $customerService)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function index(): JsonResponse
    {
        $customerDTO = $this->customerService->getAllWithPagination();
        return $this->respondOK($customerDTO->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerSaveRequest $request
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function store(CustomerSaveRequest $request): JsonResponse
    {
        $customerDTO = new CustomerDTO($request->validated());
        $customerDTO = $this->customerService->store($customerDTO);
        return $this->respondCreated($customerDTO->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws UnknownProperties|BaseException
     */
    public function show(int $id): JsonResponse
    {
        $customerDTO = $this->customerService->getById($id);
        return $this->respondOk($customerDTO->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerSaveRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws UnknownProperties|BaseException
     */
    public function update(CustomerSaveRequest $request, int $id): JsonResponse
    {
        $customerDTO = new CustomerDTO($request->validated());
        $customerDTO = $this->customerService->updateById($customerDTO, $id);
        return $this->respondOk($customerDTO->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws UnknownProperties|BaseException
     * @throws \Throwable
     */
    public function destroy(int $id): JsonResponse
    {
        $this->customerService->deleteById($id);
        return $this->respondOk();
    }
}
