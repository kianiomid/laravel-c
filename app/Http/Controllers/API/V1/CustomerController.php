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

/**
 * @OA\Schema(
 *      title="PaginationDTO",
 *      description="Pagination DTO",
 *      schema="PaginationDTO",
 *      @OA\Xml(
 *         name="PaginationDTO"
 *      ),
 *      @OA\Property(property="first", type="string", description="First page URL", example="http://exchange.local/api/v1/customers?per_page=20&page=1"),
 *      @OA\Property(property="last", type="string", description="Last page URL", example="http://exchange.local/api/v1/customers?per_page=20&page=3"),
 *      @OA\Property(property="prev", type="string", description="Previous page URL", example="http://exchange.local/api/v1/customers?per_page=20&page=1"),
 *      @OA\Property(property="next", type="string", description="Next page URL", example="http://exchange.local/api/v1/customers?per_page=20&page=2"),
 *      @OA\Property(property="total", type="integer", description="Total number of items", example=10),
 *      @OA\Property(property="per_page", type="integer", description="Total number of items in each page", example=10),
 *      @OA\Property(property="current_page", type="integer", description="Current page", example=1),
 *      @OA\Property(property="total_pages", type="integer", description="Total pages", example=10),
 * )
 */

class CustomerController extends Controller
{
    /**
     * @param ICustomerService $customerService
     */

    /**
     * @OA\Schema(
     *      title="CustomerDTO",
     *      description="CustomerDTO",
     *      schema="CustomerDTO",
     *      @OA\Xml(
     *         name="CustomerDTO"
     *      ),
     *      @OA\Property(property="id", type="integer", description="Customer Id", example=1),
     *      @OA\Property(property="first_name", type="string", description="first_name", example="Omid"),
     *      @OA\Property(property="last_name", type="string", description="last_name", example="Kiani"),
     *      @OA\Property(property="date_of_birth", type="string", description="date_of_birth", example="1372/04/02"),
     *      @OA\Property(property="phone_number", type="string", description="phone_number", example="09331116877"),
     *      @OA\Property(property="email", type="string", description="email", example="kianiomid11@gmail.com"),
     *      @OA\Property(property="bank_account_number", type="string", description="bank_account_number", example="240470000000007417144412"),
     *      @OA\Property(property="created_at", type="string", description="Customer creation time", example="2024-03-27 07:10:57"),
     *      @OA\Property(property="updated_at", type="string", description="Customer update time", example="2024-03-27 07:10:57"),
     * )
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

    /**
     * @OA\Get(
     *      path="/api/v1/customers",
     *      summary="Display a listing of the resource.",
     *      description="",
     *      operationId="CustomerIndex",
     *      tags={"Customers"},
     *      security={ {"jwt": {}} },
     *     @OA\Parameter(
     *          name="accept-language",
     *          description="Accept-Language header.",
     *          required=true,
     *          in="header",
     *          example="fa",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="page",
     *          description="Page for pagination",
     *          required=false,
     *          in="query",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Ok"),
     *              @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/CustomerDTO")),
     *              @OA\Property(property="pagination", type="array", @OA\Items(ref="#/components/schemas/PaginationDTO"))
     *          )
     *      ),
     *      @OA\Response(
     *          response=406,
     *          description="Not Acceptable",
     *          @OA\JsonContent(
     *              @OA\Property(property="error_code", type="string", example="not_acceptable"),
     *              @OA\Property(property="message", type="string", example="Not Acceptable"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *              @OA\Property(property="error_code", type="string", example="unprocessable_entity"),
     *              @OA\Property(property="message", type="string", example="Unprocessable Entity"),
     *              @OA\Property(property="errors", type="object", example={
     *                      "page":{"The page field must be integer."}
     *                  })
     *           )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *              @OA\Property(property="error_code", type="string", example="internal_server_error"),
     *              @OA\Property(property="message", type="string", example="Internal Server Error"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     * )
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

    /**
     * @OA\Post(
     *      path="/api/v1/customers",
     *      summary="Store a newly created resource in storage.",
     *      description="",
     *      operationId="CustomerStore",
     *      tags={"Customers"},
     *      security={ {"jwt": {}} },
     *     @OA\Parameter(
     *          name="accept-language",
     *          description="Accept-Language header.",
     *          required=true,
     *          in="header",
     *          example="fa",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *             @OA\Property(property="first_name", type="string", description="first_name", example="Omid"),
     *             @OA\Property(property="last_name", type="string", description="last_name", example="Kiani"),
     *             @OA\Property(property="date_of_birth", type="string", description="date_of_birth", example="1372/04/02"),
     *             @OA\Property(property="phone_number", type="string", description="phone_number", example="09331116877"),
     *             @OA\Property(property="email", type="string", description="email", example="kianiomid11@gmail.com"),
     *             @OA\Property(property="bank_account_number", type="string", description="bank_account_number", example="240470000000007417144412"),
     *             @OA\Property(property="created_at", type="string", description="Customer creation time", example="2024-03-27 07:10:57"),
     *             @OA\Property(property="updated_at", type="string", description="Customer update time", example="2024-03-27 07:10:57"),
     *      )
     * ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Ok"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/CustomerDTO"),
     *              @OA\Property(property="pagination", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=406,
     *          description="Not Acceptable",
     *          @OA\JsonContent(
     *              @OA\Property(property="error_code", type="string", example="not_acceptable"),
     *              @OA\Property(property="message", type="string", example="Not Acceptable"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *              @OA\Property(property="error_code", type="string", example="unprocessable_entity"),
     *              @OA\Property(property="message", type="string", example="Unprocessable Entity"),
     *              @OA\Property(property="errors", type="object", example={
     *                      "name":{"The name has already been taken."}
     *                  })
     *           )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", type="string", example="internal_server_error"),
     *              @OA\Property(property="message", type="string", example="Internal Server Error"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     * )
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

    /**
     * @OA\Get(
     *      path="/api/v1/customers/{customerId}",
     *      summary="Display the specified resource.",
     *      description="",
     *      operationId="CustomerShow",
     *      tags={"Customers"},
     *      security={ {"jwt": {}} },
     *     @OA\Parameter(
     *          name="accept-language",
     *          description="Accept-Language header.",
     *          required=true,
     *          in="header",
     *          example="fa",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="customerId",
     *          description="Customer ID",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Ok"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/CustomerDTO"),
     *              @OA\Property(property="pagination", type="object",example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", type="string", example="not_found"),
     *              @OA\Property(property="message", type="string", example="Not Found"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=406,
     *          description="Not Acceptable",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", type="string", example="not_acceptable"),
     *              @OA\Property(property="message", type="string", example="Not Acceptable"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", type="string", example="internal_server_error"),
     *              @OA\Property(property="message", type="string", example="Internal Server Error"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     * )
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

    /**
     * @OA\Post(
     *      path="/api/v1/customers/{customerId}",
     *      summary="Update the specified resource in storage.",
     *      description="",
     *      operationId="CustomerUpdate",
     *      tags={"Customers"},
     *      security={ {"jwt": {}} },
     *     @OA\Parameter(
     *          name="accept-language",
     *          description="Accept-Language header.",
     *          required=true,
     *          in="header",
     *          example="fa",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="customerId",
     *          description="Customer ID",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *             @OA\Property(property="first_name", type="string", description="first_name", example="Omid"),
     *             @OA\Property(property="last_name", type="string", description="last_name", example="Kiani"),
     *             @OA\Property(property="date_of_birth", type="string", description="date_of_birth", example="1372/04/02"),
     *             @OA\Property(property="phone_number", type="string", description="phone_number", example="09331116877"),
     *             @OA\Property(property="email", type="string", description="email", example="kianiomid11@gmail.com"),
     *             @OA\Property(property="bank_account_number", type="string", description="bank_account_number", example="240470000000007417144412"),
     *             @OA\Property(property="created_at", type="string", description="Customer creation time", example="2024-03-27 07:10:57"),
     *             @OA\Property(property="updated_at", type="string", description="Customer update time", example="2024-03-27 07:10:57"),
     *      )
     * ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Ok"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/CustomerDTO"),
     *              @OA\Property(property="pagination", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", type="string", example="not_found"),
     *              @OA\Property(property="message", type="string", example="Not Found"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=406,
     *          description="Not Acceptable",
     *          @OA\JsonContent(
     *              @OA\Property(property="error_code", type="string", example="not_acceptable"),
     *              @OA\Property(property="message", type="string", example="Not Acceptable"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *              @OA\Property(property="error_code", type="string", example="unprocessable_entity"),
     *              @OA\Property(property="message", type="string", example="Unprocessable Entity"),
     *              @OA\Property(property="errors", type="object", example={
     *                      "name":{"The name has already been taken."}
     *                  })
     *           )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", type="string", example="internal_server_error"),
     *              @OA\Property(property="message", type="string", example="Internal Server Error"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     * )
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

    /**
     * @OA\Delete(
     *      path="/api/v1/customers/{customerId}",
     *      summary="Remove the specified resource from storage.",
     *      description="",
     *      operationId="an",
     *      tags={"Customers"},
     *      security={ {"jwt": {}} },
     *     @OA\Parameter(
     *          name="accept-language",
     *          description="Accept-Language header.",
     *          required=true,
     *          in="header",
     *          example="fa",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="customerId",
     *          description="Customer ID",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Ok"),
     *              @OA\Property(property="data", type="object", example={}),
     *              @OA\Property(property="pagination", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", type="string", example="not_found"),
     *              @OA\Property(property="message", type="string", example="Not Found"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=406,
     *          description="Not Acceptable",
     *          @OA\JsonContent(
     *              @OA\Property(property="error_code", type="string", example="not_acceptable"),
     *              @OA\Property(property="message", type="string", example="Not Acceptable"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", type="string", example="internal_server_error"),
     *              @OA\Property(property="message", type="string", example="Internal Server Error"),
     *              @OA\Property(property="errors", type="object", example={})
     *          )
     *      ),
     * )
     */
    public function destroy(int $id): JsonResponse
    {
        $this->customerService->deleteById($id);
        return $this->respondOk();
    }
}
