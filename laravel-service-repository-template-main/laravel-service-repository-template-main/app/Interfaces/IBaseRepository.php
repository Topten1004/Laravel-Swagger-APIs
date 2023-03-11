<?php

namespace App\Interfaces;

interface IBaseRepository
{
    public function paginatedList($data = []);

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function findById($id);
}
