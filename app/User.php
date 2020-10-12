<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\BackEnd\roleuser;
use App\BackEnd\permissionrole;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles1(){
        return $this->belongsToMany('App\BackEnd\role','users_roles','user_id','role_id');
    }



    public function list11($id1){
        $roles =auth()->user()->roles1;

        foreach ($roles as $role) {
            $permission = permissionrole::where('role_id',$role->id)->get();
          //  dd($permission);
            if($permission->contains('permission_id',$id1)){
                return true;
            }
        }
       return false;

    }

    public function create11($id1){
        $roles =auth()->user()->roles1;

        foreach ($roles as $role) {
            $permission = permissionrole::where('role_id',$role->id)->get();
          //  dd($permission);
            if($permission->contains('permission_id',$id1)){
                return true;
            }
        }
       return false;

    }


    public function delete11($id1){
        $roles =auth()->user()->roles1;

        foreach ($roles as $role) {
            $permission = permissionrole::where('role_id',$role->id)->get();
          //  dd($permission);
            if($permission->contains('permission_id',$id1)){
                return true;
            }
        }
       return false;

    }

    public function update11($id1){
        $roles =auth()->user()->roles1;

        foreach ($roles as $role) {
            $permission = permissionrole::where('role_id',$role->id)->get();
          //  dd($permission);
            if($permission->contains('permission_id',$id1)){
                return true;
            }
        }
       return false;

    }
}
