<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->perPage = config('enums.perPage');
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function getAll()
    {
        return $this->model->orderBy('id', 'DESC')->get();
    }

    public function getById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function getPaginated($perPage)
    {
        return $this->model->paginate($perPage ?: $this->perPage);
    }

    public function getPaginatedByFilter($filter, $perPage)
    {
        return $this->model->filter($filter)->orderBy('id', 'DESC')->paginate($perPage ?: $this->perPage);
    }

    public function update(array $data, $id)
    {
        $getData = $this->getById($id);
        $getData->fill($data);

        return $getData->push();
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
