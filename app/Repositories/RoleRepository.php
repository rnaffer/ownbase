<?php

namespace App\Repositories;

use App\Role;
use App\Repositories\Common\BaseRepository;

class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role::class;
    }
}
