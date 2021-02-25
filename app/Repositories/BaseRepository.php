<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    protected $with = [];
    protected $currentModel;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->currentModel = $model;
    }

    public function findById($id)
    {
        $this->newQuery()->eagerLoadRelations();
        
        //$this->model đã là 1 câu query có with trong func eagerLoadRelations();
        $result = $this->model->findOrFail($id);

        $this->model = $this->currentModel;
        $this->with = [];

        return $result;
    }

    public function findByField($field, $name)
    {
        return $this->model->where(`$field`, 'like', `%$name%`)->get();
    }

    public function newQuery()
    {
        $this->model = $this->model->newQuery();
        // gán model thành 1 câu query
        
        return $this;
    }

    public function getAll($columns = [])
    {
        $this->newQuery()->eagerLoadRelations();
        
        //$this->model đã là 1 câu query có with trong func eagerLoadRelations();
        $all = $this->model->get();

        $this->model = $this->currentModel;
        $this->with = [];

        return $all;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function paginate($perPage = null, $columns = array('*'))
    {
        $this->newQuery()->eagerLoadRelations();

        $paginate = $this->model->paginate($perPage, $columns);
        $this->model = $this->currentModel;
        $this->with = [];

        return $paginate;
    }

    public function with($relations)
    {
        if (is_string($relations))
        {
            $this->with = explode(',', $relations);

            return $this;
        }

        $this->with = is_array($relations) ? $relations : [];

        return $this;
    }

    public function eagerLoadRelations()
    {
        if(!empty($this->with)) {
            $this->model->with($this->with);
        }
    
        return $this;
    }
}