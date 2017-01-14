<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $fillable = ['name', 'method', 'table_name'];
	/**
	 * Roles Relationship
	 */
    public function roles()
    {
    	return $this->belongsToMany(Role::class, 'permissions_roles', 'role_id', 'permission_id');
    }
    /**
     * Generating Permissions methods
     */
    public static function generateFor($table_name)
    {
        self::firstOrCreate(['name' => 'browse_'.$table_name, 'table_name' => $table_name]);
        self::firstOrCreate(['name' => 'read_'.$table_name, 'table_name' => $table_name]);
        self::firstOrCreate(['name' => 'edit_'.$table_name, 'table_name' => $table_name]);
        self::firstOrCreate(['name' => 'add_'.$table_name, 'table_name' => $table_name]);
        self::firstOrCreate(['name' => 'delete_'.$table_name, 'table_name' => $table_name]);
    }
    /**
     * Removing Permissions methods
     */
    public static function removeFrom($table_name)
    {
        self::where(['table_name' => $table_name])->delete();
    }
}
