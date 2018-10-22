<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model implements Auditable
{
    
    use \OwenIt\Auditing\Auditable;

	use SoftDeletes;

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = "products";

    protected $fillable = ["name", "stock", "price"];

    protected $hidden = ["created_at", "updated_at", "deleted_at"];
}
