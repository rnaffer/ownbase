<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Response;

/**
 * Class RoleAPIController
 * @package App\Http\Controllers\API
 */

class RoleAPIController extends Controller
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->pushCriteria($request)->all();

        return response()->json($roles->toArray());
    }

    /**
     * @param CreateRoleAPIRequest $request
     * @return Response
     *
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $roles = $this->roleRepository->create($input);

        return response()->json($roles->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function show($id)
    {
        /** @var Role $role */
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            return response('Role not found', 404);
        }

        return response()->json($role->toArray());
    }

    /**
     * @param int $id
     * @param UpdateRoleAPIRequest $request
     * @return Response
     *
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Role $role */
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            return response('Role not found', 404);
        }

        $role = $this->roleRepository->update($input, $id);

        return response()->json($role->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function destroy($id)
    {
        /** @var Role $role */
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            return response('Role not found', 404);
        }

        $role->delete();

        return response()->json($id);
    }
}
