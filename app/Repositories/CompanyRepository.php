<?php

namespace App\Repositories;

use App\Company;
use App\Repositories\Common\BaseRepository;

class CompanyRepository extends BaseRepository
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
        return Company::class;
    }
}
