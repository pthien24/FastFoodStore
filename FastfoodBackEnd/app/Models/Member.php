<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;
    protected $guard = 'members';
    protected $table = 'members';
    protected $hidden =[
        'password','remember_token',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    public function getOrders()
    {
        return $this->orders;
    }
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }
}
