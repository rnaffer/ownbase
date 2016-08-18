<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = 'permissions';

    protected $dates = ['created_at', 'updated_at'];

    protected $shortRelations = ['role', 'module'];

    protected $fullRelations = ['role', 'module'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'role_id', 'module_id', 'addon', 'edit', 'see', 'disable'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * full relations of the model
     * @return array
     */
    public function getFullRelations()
    {
        return $this->fullRelations;
    }

    /**
     * short relations of the model
     * @return array
     */
    public function getShortRelations()
    {
        return $this->shortRelations;
    }
}
