<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    public $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * @param $userId
     * @return JsonResponse
     */
    public function getUser($userId): JsonResponse
    {
        $response = $this->userService->getUser($userId);
        return response()->json($response, $response['status']);
    }

    /**
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function updateUser(UpdateUserRequest $request): JsonResponse
    {
        $response = $this->userService->updateUser($request->all());
        return response()->json($response, $response['status']);
    }

    /**
     * @param $userId
     * @return JsonResponse
     */
    public function deleteUser($userId): JsonResponse
    {
        $response = $this->userService->deleteUser($userId);
        return response()->json($response, $response['status']);
    }

    /**
     * @param CreateUserRequest $request
     * @return JsonResponse
     */
    public function createUser(CreateUserRequest $request): JsonResponse
    {
        $response = $this->userService->createUser($request->all());

        return response()->json($response, $response['status']);
    }
}
