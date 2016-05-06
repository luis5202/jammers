<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    protected $table = 'shipping_details';
	protected $fillable = ['name', 'email', 'last_name', 'user', 'address', 'country', 'state', 'city','colony','post_code', 'phone_number', 'references_address','order_id'];
	public $timestamps = true;
	public function order()
	{
	    return $this->belongsTo('App\Order');
	}
	
}
