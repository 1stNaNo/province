<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 */
class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'role_id';

	public $timestamps = true;

    protected $fillable = [
        'role_name',
        'description'
    ];

    protected $guarded = [];

        
}