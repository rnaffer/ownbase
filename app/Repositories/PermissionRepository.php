<?php

namespace App\Repositories;

use App\Permission;
use App\Repositories\Common\BaseRepository;

class PermissionRepository extends BaseRepository
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
        return Permission::class;
    }
}
