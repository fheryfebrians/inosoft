<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\PenjualanInterface;
use App\Traits\ResponseAPI;

class PenjualanService
{
    private $penjualanInterface;

    use ResponseAPI;

    public function __construct(PenjualanInterface $penjualanInterface)
    {
        $this->penjualanInterface = $penjualanInterface;
    }

    public function getAllData()
    {
        try {
            $data = $this->penjualanInterface->getAll();
            return $this->success("Success", $data);
        } catch(\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function getDataById($id)
    {
        try {
            $data = $this->penjualanInterface->getById($id);
            return $this->success("Success", $data);
        } catch(\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function storeData($payload)
    {
        try {
            $data = [
                'kendaraan_id' => $payload->kendaraan_id,
                'jumlah' => $payload->jumlah
            ];

            $this->penjualanInterface->create($data);
            return $this->success("Success", $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function updateData($id, $payload)
    {
        try {
            $data = [
                'kendaraan_id' => $payload->kendaraan_id,
                'jumlah' => $payload->jumlah
            ];
            
            $this->penjualanInterface->update($id, $data);
            return $this->success("Success", $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->penjualanInterface->delete($id);
            return $this->success("Success", $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function laporan()
    {
        try {
            $data = $this->penjualanInterface->laporan();
            return $this->success("Success", $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }
}