<?php 
namespace App\Repository;
use App\Repository\Interfaces\ActionRepository;
class ModelAction implements ActionRepository
{
	private $model;
	private $query;

	public function __construct($model)
	{
		$this->model = $model;
		$this->query = $model;
	}

	public function getAll($where = [])
	{
		if(method_exists($this->model, 'scopeSearch'))
		{
			return $this->query->search($where)->paginate();
		}
		return $this->query->paginate();
	}

	public function getById($id)
	{
		return $this->model->find($id);
	}

	public function create($data)
	{
		return $this->model->create($data);
	}

	public function update($id, $data)
	{
		$model = $this->getById($id);
		$model->update($data);
	}

	public function delete($id)
	{
		return $this->model->destroy($id);
	}

	public function with($model)
	{
		$this->query = $this->query->with($model);
		return $this;
	}

	public function sync($relation, $data)
	{
		if(!empty($data))
		{
			return $this->model->$relation()->sync($data);
		}
		return $this->model->$relation()->detach();
	}

	public function createMany($relation, $data)
	{
		return $this->model->$relation()->createMany($data);
	}

	public function deleteMany($relation)
	{
		return $this->model->$relation()->delete();
	}

	public function withCnt($relation)
	{
		$this->query = $this->query->withCount($relation);
		return $this;
	}

	public function order($field, $type = 'asc')
	{
		$this->query = $this->query->orderBy($field, $type);
		return $this;
	}

	public function setModel($model)
	{
		$this->model = $model;
	}
}