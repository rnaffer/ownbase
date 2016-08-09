<?php

use Faker\Factory as Faker;
use App\User;
use App\Repositories\UserRepository;

trait MakeUserTrait
{
    /**
     * Create fake instance of User and save it in database
     *
     * @param array $userFields
     * @return User
     */
    public function makeUser($userFields = [])
    {
        /** @var UserRepository $userRepo */
        $userRepo = App::make(UserRepository::class);
        $theme = $this->fakeUserData($userFields);
        return $userRepo->create($theme);
    }

    /**
     * Get fake instance of User
     *
     * @param array $userFields
     * @return User
     */
    public function fakeUser($userFields = [])
    {
        return new User($this->fakeUserData($userFields));
    }

    /**
     * Get fake data of User
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUserData($userFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'apellido' => $fake->word,
            'cedula' => $fake->word,
            'email' => $fake->email,
            'password' => bcrypt(str_random(10)),
            'direccion' => $fake->address,
            'telefono' => $fake->phoneNumber,
            'estatus' => $fake->boolean,
            'rol_id' => $fake->randomDigitNotNull,
            'remember_token' => $fake->word,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ], $userFields);
    }
}
