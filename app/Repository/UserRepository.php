<?php


namespace App\Repository;


use App\Http\Models\User;

class UserRepository implements Interfaces\RepositoryInterface
{

    protected $model;
    public function __construct(User $user)
    {
        $this->model=$user;
    }

    public function all()
    {
        return $this->model->all();

    }

    public function get($id)
    {
        $user=$this->model->findOrFail($id);
        return $user;

    }

    public function delete($id)
    {
        $this->model->destroy('id',$id);
    }

    public function update(array $data, $id)
    {
        $user=$this->model->findOrFail($id);
        $user->update($data);
        return $user;

    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }
}
