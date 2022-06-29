<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthService extends BaseService
{
    protected $repoUser;

    public function __construct(
        UserRepository $repoUser
    )
    {
        parent::__construct();
        $this->repoUser = $repoUser;
    }

    public function login($request)
    {
        $db = DB::connection($this->connection);
        $db->beginTransaction();
        try {
            $item = $this->repoUser->getByEmail($request);
            if (!isset($item)) {
                $db->rollback();
                return $this->responseMessage(__('content.message.not_registered'), 200, true);
            }

            if (Auth::attempt(['email' => $item->email, 'password' => $request->password]) == false) {
                $db->rollback();
                return $this->responseMessage(__('content.message.not_match'), 200, true);
            }
            $user = Auth::user();
            // $permissions = array();
            // $dataPermissions = $user->getPermissionsViaRoles();

            // foreach ($dataPermissions as $value) {
            //     array_push($permissions, $value->name);
            // }

            $data['access_token'] = $user->createToken('nApp')->accessToken;
            // $data['role_id'] = $user->roles->first()->id;
            // $data['role_name'] = $user->getRoleNames()->first();
            // $data['permissions'] = $permissions;

            $db->commit();

            return $this->responseMessage(__('content.message.login.success'), 200, true, $data);
        } catch (Exception $exc) {
            Log::error($exc);
            $db->rollback();
            return $this->responseMessage(__('content.message.login.failed'), 400, false);
        }
    }
}
