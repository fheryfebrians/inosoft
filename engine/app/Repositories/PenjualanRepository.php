<?php

namespace App\Repositories;

use App\Interfaces\PenjualanInterface;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class PenjualanRepository implements PenjualanInterface
{
    protected $model;

    public function __construct(Penjualan $model)
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

    public function laporan()
    {
        $data = $this->model->groupBy('kendaraan_id')->select('jumlah')->get();

        return $data;
    }
}