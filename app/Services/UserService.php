<?php


namespace App\Services;

use App\Models\User;
use App\Traits\FileTrait;
use Illuminate\Http\Response;

class UserService
{
    use FileTrait;

    /**
     * @param array $data
     * @return array
     */
    public function createUser(array $data): array
    {
        $filename = null;

        try {
            if ($data['photo']) {
                $filename = $this->upload($data['photo'], 'avatars');
            }

            $user = User::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'photo' => $filename
            ]);

            return [
                'success' => true,
                'user' => $user,
                'message' => 'User is successfully created',
                'status' => Response::HTTP_OK
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'user' => null,
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            ];
        }
    }

    /**
     * @param $userId
     * @return array
     */
    public function getUser($userId): array
    {
        $user = User::find($userId);

        if (is_null($user)) {
            return [
                'success' => false,
                'message' => 'User not found',
                'status' => Response::HTTP_NOT_FOUND
            ];
        }

        return [
            'success' => true,
            'user' => $user,
            'status' => Response::HTTP_OK
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateUser(array $data): array
    {
        try {
            $user = User::find($data['userId']);

            if (is_null($user)) {
                return [
                    'success' => false,
                    'message' => 'User not found',
                    'status' => Response::HTTP_NOT_FOUND
                ];
            }

            if (isset($data['photo'])) {
                $this->deleteFile($user->photo, 'avatars');
                $data['photo'] = $this->upload($data['photo'], 'avatars');
            }

            $user->fill($data)->update();

            return [
                'success' => true,
                'message' => 'Data updated successfully',
                'status' => Response::HTTP_OK
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'user' => null,
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            ];
        }
    }

    /**
     * @param $userId
     * @return array
     */
    public function deleteUser($userId): array
    {
        try {
            $user = User::find($userId);

            if (is_null($user)) {
                return [
                    'success' => false,
                    'message' => 'User not found',
                    'status' => Response::HTTP_NOT_FOUND
                ];
            }

            $user = $user->delete();

            if ($user) {
                return [
                    'success' => true,
                    'message' => 'User successfully deleted',
                    'status' => Response::HTTP_OK
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'User was not deleted',
                    'status' => Response::HTTP_OK
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            ];
        }
    }
}
