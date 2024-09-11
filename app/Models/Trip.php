<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory, SoftDeletes;

 
    protected $fillable = ['airbusType_id', 'booking_id', 'customer_id', 'airbus_id', 'class_id', 'start_date', 'start_time', 'payment_type', 'price', 'discount', 'total_point', 'agent_point_amount', 'child_price', 'description', 'image', 'ip_address', 'created_by', 'updated_by', 'status'];

    public function airbusType()
    {
        return $this->belongsTo(AirbusType::class, 'airbusType_id', 'id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function tripClass()
    {
        return $this->belongsTo(TripClass::class, 'class_id', 'id');
    }

    public function airbus()
    {
        return $this->belongsTo(Airbus::class, 'airbus_id', 'id');
    }
}
