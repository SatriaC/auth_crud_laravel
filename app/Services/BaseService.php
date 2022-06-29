<?php

namespace App\Services;
use Illuminate\Pagination\Paginator;
use App\Helpers\PaginationCollection;
use Illuminate\Support\Collection;

class BaseService
{
    protected $env;
    protected $productionEnv = 'production';
    protected $connection = 'mysql';

    public function __construct()
    {
        $this->env = config('app.env');
    }

    public function responseMessage($message, $statusCode, $isSuccess = false, $data = [])
    {
        return response()->json(
            [
                "message" => $message,
                "success" => $isSuccess,
                "data" => $data
            ],
            $statusCode
        );
    }

    public function paginate($items, $tag, $request, $page = null, $options = [])
    {
        if (isset($request->perPage)) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }
        $tag = $tag;
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new PaginationCollection($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options, $tag);
    }
}
