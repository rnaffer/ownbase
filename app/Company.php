<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $shortRelations = ['users'];

    protected $fullRelations = ['users'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name', 'identification', 'address', 'phone', 'cellphone', 'website', 'email', 'logo_url', 'state'
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