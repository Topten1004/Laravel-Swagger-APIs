<?php

namespace App\Repositories;

use App\Constants\Pagination;
use App\Interfaces\IBaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class BaseRepository implements IBaseRepository
{

    protected Model $modelClass;

    /**
     * @param Model $modelClass
     */
    public function __construct(Model $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * @throws Throwable
     */
    protected function query(): Builder|Model
    {
        /** @var Model $class */
        $query = $this->getModel()->query();
        return $query->orderByDesc('id');
    }

    /**
     * @return Model
     * @throws Throwable
     */
    protected function getModel(): Model
    {
        return $this->modelClass;
    }

    /**
     * @throws Throwable
     */
    public function paginatedList($data = [],array|string $with = null): LengthAwarePaginator
    {
        $query = $this->query();
        if (method_exists($this->getModel(), 'scopeFilter'))
            $query->filter($data);

        if (!is_null($with))
            $query->with($with);

        return $query->paginate(Pagination::PerPage);
    }

    /**
     * @param $data
     * @return Model|Model[]|Builder|Builder[]|Collection|null
     * @throws Throwable
     */
    public function create($data): array|Collection|Builder|Model|null
    {
        $model = $this->getModel();
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param $data
     * @param $id
     * @return Model|Model[]|Builder|Builder[]|Collection|null
     * @throws Throwable
     */
    public function update($data, $id): Model|array|Collection|Builder|null
    {
        $model = $this->findById($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param $id
     * @return Model|Model[]|Builder|Builder[]|Collection|null
     * @throws Throwable
     */
    public function findById($id): Model|array|Collection|Builder|null
    {
        return $this->getModel()::query()->findOrFail($id);
    }

    /**
     * @param $id
     * @return array|Builder|Builder[]|Collection|Model|Model[]
     * @throws Throwable
     */
    public function delete($id): array|Builder|Collection|Model
    {
        $model = $this->findById($id);
        $model->delete();
        return $model;
    }
}
