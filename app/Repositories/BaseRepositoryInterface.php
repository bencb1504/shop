<?php
namespace App\Repositories;

interface BaseRepositoryInterface {
    public function findById($id);
    public function findByField($field, $name);
    public function getAll();
    public function create(array $data);

    public function update(array $data, $id, $attribute = "id");

    public function delete($id);
    public function paginate($perPage = 15, $columns = array('*'));
    public function with($relations);
}