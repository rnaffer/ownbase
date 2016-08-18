<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Response;

/**
 * Class PermissionAPIController
 * @package App\Http\Controllers\API
 */

class PermissionAPIController extends Controller
{
    /** @var  PermissionRepository */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     */
    public function index(Request $request)
    {
        $permissions = $this->permissionRepository->pushCriteria($request)->all();

        return response()->json($permissions->toArray());
    }

    /**
     * @param CreatePermissionAPIRequest $request
     * @return Response
     *
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $permissions = $this->permissionRepository->create($input);

        return response()->json($permissions->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function show($id, Request $request)
    {
        /** @var Permission $permission */
        $permission = $this->permissionRepository->pushCriteria($request)->find($id);

        if (empty($permission)) {
            return response('Permission not found', 404);
        }

        return response()->json($permission->toArray());
    }

    /**
     * @param int $id
     * @param UpdatePermissionAPIRequest $request
     * @return Response
     *
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Permission $permission */
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            return response('Permission not found', 404);
        }

        $permission = $this->permissionRepository->update($input, $id);

        return response()->json($permission->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function destroy($id)
    {
        /** @var Permission $permission */
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            return response('Permission not found', 404);
        }

        $permission->delete();

        return response()->json($id);
    }
}
