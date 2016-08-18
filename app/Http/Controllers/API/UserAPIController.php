<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Response;

/**
 * Class UserAPIController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends Controller
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->pushCriteria($request)->all();

        return response()->json($users->toArray());
    }

    /**
     * @param CreateUserAPIRequest $request
     * @return Response
     *
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $users = $this->userRepository->create($input);

        return response()->json($users->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function show($id, Request $request)
    {
        /** @var User $user */
        $user = $this->userRepository->pushCriteria($request)->find($id);

        if (empty($user)) {
            return response('User not found', 404);
        }

        return response()->json($user->toArray());
    }

    /**
     * @param int $id
     * @param UpdateUserAPIRequest $request
     * @return Response
     *
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return response('User not found', 404);
        }

        $user = $this->userRepository->update($input, $id);

        return response()->json($user->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return response('User not found', 404);
        }

        $user->delete();

        return response()->json($id);
    }
}
