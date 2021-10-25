<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Manowartop\ServiceRepositoryPattern\Exceptions\Repository\InvalidModelClassException;
use Manowartop\ServiceRepositoryPattern\Models\BaseModel;
use Manowartop\ServiceRepositoryPattern\Traits\Crudable;
use Manowartop\ServiceRepositoryPattern\Traits\Queryable;

abstract class BaseRepository implements BaseRepositoryInterface
{
    use Crudable, Queryable;

    /**
     * Class of the model repository works with.
     *
     * @var string
     */
    protected $modelClass;

    /**
     * Model instance.
     *
     * @var Model|BaseModel|\Eloquent
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @throws InvalidModelClassException
     */
    public function __construct()
    {
        $this->resolveModelEntity();
    }

    /**
     * Get the model of current repository.
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * Resolve model entity if it is valid.
     *
     * @return void
     * @throws InvalidModelClassException
     */
    protected function resolveModelEntity(): void
    {
        if (is_null($this->modelClass)) {
            throw new InvalidModelClassException('Model class is null');
        }

        $this->model = resolve($this->modelClass);

        if (!$this->model instanceof Model) {
            throw new InvalidModelClassException("{$this->modelClass} is not an instance of Model");
        }
    }

    /**
     * Resolve model by key or return the model instance back.
     *
     * @param $keyOrModel
     * @return Model
     */
    protected function resolveModel($keyOrModel): Model
    {
        return !$keyOrModel instanceof Model
            ? $this->findOrFail($keyOrModel)
            : $keyOrModel;
    }

    /**
     * Create model with data.
     *
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model
    {
        return $this->model::create($data);
    }

    /**
     * Find model by PK.
     *
     * @param int|string $key
     * @return Model|null
     */
    public function find($key): ?Model
    {
        return $this->model::find($key);
    }

    /**
     * Get filtered collection.
     *
     * @param array $search
     * @return Collection
     */
    public function getAll(array $search = []): Collection
    {
        return $this->model::all();
    }
}
