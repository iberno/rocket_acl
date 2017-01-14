<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];
    /**
     * Users Relationship
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
    /**
     * Permissions Relationship
     */
    public function permissions()
    {
    	return $this->belongsToMany(Permission::class, 'permissions_roles', 'role_id', 'permission_id');
    }
}
