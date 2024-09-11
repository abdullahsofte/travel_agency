<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentCommission extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'payment_type', 'agent_point', 'amount', 'date', 'note', 'balance_point', 'ip_address', 'created_by'];
    

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    
}
