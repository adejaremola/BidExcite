
<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Bid extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $table = 'bids';
	protected $fillable = array('user_id', 'deal_id', 'price', 'accepted');
 
	public static $rules = 
	[
		'price' => 'required|min:0'
	];

	//reverse relationship with Deal model (getBids)
	public function getDeal()
	{
		return $this->belongsTo('Deal', 'item_id');
	}

	//reverse relationship with User model (hasBids)
	public function getUser()
	{
		return $this->belongsTo('User', 'user_id');
	}
}














