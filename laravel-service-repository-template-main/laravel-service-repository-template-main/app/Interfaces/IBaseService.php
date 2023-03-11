<?php

namespace App\Interfaces;

interface IBaseService
{
    public function paginatedList($data = []);

    public function createModel($data);

    public function updateModel($data, $id);

    public function deleteModel($id);

    public function getModelById($id);
}
