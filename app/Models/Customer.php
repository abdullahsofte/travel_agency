<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
    use HasFactory,Notifiable ,SoftDeletes;

    protected $fillable = ['name','phone','email','address','profile_picture','username','password','status','save_by','updated_by'];


    public function trip()
    {
        return $this->hasMany(Trip::class);
    }

    public function agentCommission()
    {
        return $this->hasMany(AgentCommission::class);
    }


    

}
