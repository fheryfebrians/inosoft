<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\KendaraanInterface;
use App\Traits\ResponseAPI;

class KendaraanService
{
    private $kendaraanRepository;

    use ResponseAPI;

    public function __construct(KendaraanInterface $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getAllData()
    {
        try {
            $data = $this->kendaraanRepository->getAll();
            return $this->success("Success", $data);
        } catch(\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function getDataById($id)
    {
        try {
            $data = $this->kendaraanRepository->getById($id);
            return $this->success("Success", $data);
        } catch(\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function storeData($payload)
    {
        try {
            $data = [
                'tahun_keluaran' => $payload->tahun_keluaran,
                'warna' => $payload->warna,
                'harga' => $payload->harga,
                'stok' => $payload->stok,
                'jenis' => $payload->jenis,
                'mesin' => $payload->mesin,
                'tipe_suspensi' => $payload->tipe_suspensi,
                'tipe_transmisi' => $payload->tipe_transmisi,
                'kapasitas_penumpang' => $payload->kapasitas_penumpang,
                'tipe' => $payload->tipe
            ];

            $this->kendaraanRepository->create($data);
            return $this->success("Success", $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function updateData($id, $payload)
    {
        try {
            $data = [
                'tahun_keluaran' => $payload->tahun_keluaran,
                'warna' => $payload->warna,
                'harga' => $payload->harga,
                'stok' => $payload->stok,
                'jenis' => $payload->jenis,
                'mesin' => $payload->mesin,
                'tipe_suspensi' => $payload->tipe_suspensi,
                'tipe_transmisi' => $payload->tipe_transmisi,
                'kapasitas_penumpang' => $payload->kapasitas_penumpang,
                'tipe' => $payload->tipe
            ];
            
            $this->kendaraanRepository->update($id, $data);
            return $this->success("Success", $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->kendaraanRepository->delete($id);
            return $this->success("Success", $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }

    public function stokData()
    {
        try {
            $data = $this->kendaraanRepository->stok();
            return $this->success("Success", $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), $th->getCode());
        }
    }
}