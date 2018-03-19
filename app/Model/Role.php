<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Role extends EntrustPermission
{
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $fillable = "[*]";
    public $timestamp = false;
}
