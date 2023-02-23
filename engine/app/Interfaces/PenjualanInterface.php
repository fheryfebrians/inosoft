<?php

namespace App\Interfaces;

interface PenjualanInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $payload);

    public function update($id, array $payload);

    public function delete($id);

    public function laporan();
}