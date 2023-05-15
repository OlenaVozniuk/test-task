<?php

namespace App\Services\Base;

use App\Services\Base\Contracts\BaseCrudServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseCrudService implements BaseCrudServiceInterface
{
    /**
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(int $pageSize = 5): LengthAwarePaginator
    {
        return $this->getModelClass()::query()->paginate($pageSize);
    }

    /**
     * Get all models
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->getModelClass()::query()->get();
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->getModelClass()::query()->create($data);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data): Model
    {
        $model->update($data);

        return $model;
    }

    /**
     * @param Model $model
     * @return void
     */
    public function destroy(Model $model): void
    {
        $model->delete();
    }

    /**
     * @return string
     */
    abstract public function getModelClass(): string;
}
