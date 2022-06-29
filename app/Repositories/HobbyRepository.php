<?php

namespace App\Repositories;

use App\Models\Hobby;
use App\Repositories\BaseRepository;

class HobbyRepository extends BaseRepository
{
    protected $repoRating;

    public function __construct(
        Hobby $model,
    ) {
        $this->model = $model;
    }

    public function index($request)
    {
        $data = $this->model
            ->select(['hobbies.*']);

        if (isset($request->sort)) {
            switch ($request->sort) {
                case 1:
                    $data->orderBy('created_at', 'asc');
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
}
