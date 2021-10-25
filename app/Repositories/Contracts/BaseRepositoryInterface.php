<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * Create model with data.
     *
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model;

    /**
     * Find model by PK.
     *
     * @param int|string $key
     * @return Model|null
     */
    public function find($key): ?Model;

    /**
     * Get filtered collection.
     *
     * @param array $search
     * @return Collection
     */
    public function getAll(array $search = []): Collection;
}
