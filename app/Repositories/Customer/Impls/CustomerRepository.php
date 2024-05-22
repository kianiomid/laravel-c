<?php

namespace App\Repositories\Customer\Impls;

use App\Models\Customer;
use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Customer\Interfaces\ICustomerRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CustomerRepository implements ICustomerRepository
{
    /**
     * @param Customer $model
     */
    public function __construct(protected Customer $model)
    {
        //
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @inheritDoc
     */
    public function allEnabled(): Collection
    {
        return $this->model->enabled()->get();
    }

    /**
     * @inheritDoc
     */
    public function paginate(int $perPage = BaseModel::PAGINATION_CHUNK): LengthAwarePaginator
    {
        return $this->model->paginate($perPage)->appends(request()?->all());
    }

    /**
     * @inheritDoc
     */
    public function create(Model $model): Model
    {
        $model->save();
        return $model->fresh();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function update(Model $model): Model
    {
        $model->save();
        return $model->fresh();
    }

    /**
     * @inheritDoc
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
