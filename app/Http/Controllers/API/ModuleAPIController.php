<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Module;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Response;

/**
 * Class ModuleAPIController
 * @package App\Http\Controllers\API
 */

class ModuleAPIController extends Controller
{
    /** @var  ModuleRepository */
    private $moduleRepository;

    public function __construct(ModuleRepository $moduleRepo)
    {
        $this->moduleRepository = $moduleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     */
    public function index(Request $request)
    {
        $modules = $this->moduleRepository->pushCriteria($request)->all();

        return response()->json($modules->toArray());
    }

    /**
     * @param CreateModuleAPIRequest $request
     * @return Response
     *
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $modules = $this->moduleRepository->create($input);

        return response()->json($modules->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function show($id, Request $request)
    {
        /** @var Module $module */
        $module = $this->moduleRepository->pushCriteria($request)->find($id);

        if (empty($module)) {
            return response('Module not found', 404);
        }

        return response()->json($module->toArray());
    }

    /**
     * @param int $id
     * @param UpdateModuleAPIRequest $request
     * @return Response
     *
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Module $module */
        $module = $this->moduleRepository->find($id);

        if (empty($module)) {
            return response('Module not found', 404);
        }

        $module = $this->moduleRepository->update($input, $id);

        return response()->json($module->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function destroy($id)
    {
        /** @var Module $module */
        $module = $this->moduleRepository->find($id);

        if (empty($module)) {
            return response('Module not found', 404);
        }

        $module->delete();

        return response()->json($id);
    }
}
