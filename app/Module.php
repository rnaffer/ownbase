<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $table = 'modules';

    protected $dates = ['created_at', 'updated_at'];

    protected $shortRelations = ['permissions'];

    protected $fullRelations = ['permissions'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'title', 'father_id'
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
