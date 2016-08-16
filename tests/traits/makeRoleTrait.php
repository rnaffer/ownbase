<?php

use Faker\Factory as Faker;
use App\Role;
use App\Repositories\RoleRepository;

trait MakeRoleTrait
{
    /**
     * Create fake instance of Role and save it in database
     *
     * @param array $roleFields
     * @return Role
     */
    public function makeRole($roleFields = [])
    {
        /** @var RoleRepository $roleRepo */
        $roleRepo = App::make(RoleRepository::class);
        $theme = $this->fakeRoleData($roleFields);
        return $roleRepo->create($theme);
    }

    /**
     * Get fake instance of Role
     *
     * @param array $roleFields
     * @return Role
     */
    public function fakeRole($roleFields = [])
    {
        return new Role($this->fakeRoleData($roleFields));
    }

    /**
     * Get fake data of Role
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRoleData($roleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->jobTitle,
            'status' => $fake->boolean,
        ], $roleFields);
    }
}
