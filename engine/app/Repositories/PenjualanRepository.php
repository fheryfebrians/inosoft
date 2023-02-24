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
        // $data = $this->model->groupBy('kendaraan_id')
        // ->selectRaw('*, sum(jumlah) as sum')
        // ->get();

        $kendaraan = $this->model->get()->groupby('kendaraan_id');
        $data = $kendaraan->map(function($kendaraan) {
            return [
                'kendaraan_id' => $kendaraan->first()['kendaraan_id'],
                'jumlah' => $kendaraan->sum('jumlah'),
                'data' => $kendaraan
            ];
        });

        return $data;
    }
}