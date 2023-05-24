<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function showRoles(): string
    {
        $roles = '';

        foreach($this->roles as $role) {
            $roles .= $role->name . ', ';
        }

        return rtrim($roles, ', ');
    }

    public function showRolesIds(): array
    {
        $roles = [];

        foreach($this->roles as $role) {
            $roles[] = $role->id;
        }

        return $roles;
    }
}
