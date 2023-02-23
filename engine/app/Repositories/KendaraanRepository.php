<?php

namespace App\Repositories;

use App\Interfaces\KendaraanInterface;
use App\Models\Kendaraan;

class KendaraanRepository implements KendaraanInterface
{
    protected $model;

    public function __construct(Kendaraan $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $payload)
    {
        return $this->model->insert($payload);
    }

    public function update($id, array $payload)
    {
        return $this->model->find($id)->update($payload);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function stok()
    {
        return $this->model->select('id', 'jenis', 'stok')->get();
    }
}