<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    public const ADMIN_ID = 1;
    public const ENTREPRENEUR_ID = 2;
    public const INVESTOR_ID = 3;

    public function users(){
        return $this->hasMany(User::class);
    }
}
