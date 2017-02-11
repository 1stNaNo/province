<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 */
class Permission extends Model
{
    protected $table = 'permissions';

    protected $primaryKey = 'permission_id';

	public $timestamps = true;

    protected $fillable = [
        'permission_name',
        'description'
    ];

    protected $guarded = [];

        
}