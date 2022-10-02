<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'orders';


    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }

    public function getOrderTotalSumAttribute()
    {
        $o = Order::select('order_total')->where('id', $this->id )->first();
        return $o->order_total;
    }
    public function getNewStatusAttribute()
    {
        $status = Order::select('order_status')->where('id', $this->id )->first();
        return $status->order_status;
    }


}
