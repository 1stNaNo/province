<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 */
class Vw_answer extends Model
{

    protected $table = "vw_answer";

    protected $guarded = [];

    protected $fillable = [];

    public function scopeFromView($query){
        $query->from('vw_answer')->whereLang(\Session::get("lang"));
    }
}
