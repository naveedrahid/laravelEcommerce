<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "order_items";


    public function order()
    {
    	return $this->belongsTo(Order::class);
    }




    public function getLineSumAttribute()
    {
        return $this->price * $this->quantity;
    }



}
