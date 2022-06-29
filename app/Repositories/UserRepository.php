<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        $data = $this->model
            ->with('hasHobbies')
            ->select(['users.*']);

        if (isset($request->sort)) {
            switch ($request->sort) {
                case 1:
                    $data->orderBy('created_at', 'desc');
                    break;

                case 2:
                    $data->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $data->orderBy('created_at', 'desc');
        }

        return $data;
    }

    public function getByEmail($request)
    {
        $data = $this->model
        ->where('email', $request->email)->orderBy('created_at', 'desc')->first();

        return $data;
    }

    public function getById($id)
    {
        $data = $this->model
            ->with('hasHobbies')
            ->where('id',$id)
            ->select(['users.*'])->orderBy('created_at', 'desc')->get()->first();

        return $data;
    }
}
