<?php

use Faker\Factory as Faker;
use App\Permission;
use App\Repositories\PermissionRepository;

trait MakePermissionTrait
{
    /**
     * Create fake instance of Permission and save it in database
     *
     * @param array $permissionFields
     * @return Permission
     */
    public function makePermission($permissionFields = [])
    {
        /** @var PermissionRepository $permissionRepo */
        $permissionRepo = App::make(PermissionRepository::class);
        $theme = $this->fakePermissionData($permissionFields);
        return $permissionRepo->create($theme);
    }

    /**
     * Get fake instance of Permission
     *
     * @param array $permissionFields
     * @return Permission
     */
    public function fakePermission($permissionFields = [])
    {
        return new Permission($this->fakePermissionData($permissionFields));
    }

    /**
     * Get fake data of Permission
     *
     * @param array $postFields
     * @return array
     */
    public function fakePermissionData($permissionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'role_id' => $fake->numberBetween(1, 10),
            'module_id' => $fake->numberBetween(1, 4),
            'addon' => $fake->boolean,
            'edit' => $fake->boolean,
            'see' => $fake->boolean,
            'disable' => $fake->boolean
        ], $permissionFields);
    }
}
