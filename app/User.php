<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    public $table = 'users';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $shortRelations = ['role'];

    protected $fullRelations = ['role.permissions'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'second',
        'document',
        'email',
        'password',
        'address',
        'phone',
        'status',
        'role_id',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
        'role_id' => 'integer'
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

    /**
    * Role of the user
    */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
