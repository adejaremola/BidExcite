
<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Bid extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait ;

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
		return $this->belongsTo('Deal', 'deal_id');
	}

	//reverse relationship with User model (hasBids)
	public function getUser()
	{
		return $this->belongsTo('User', 'user_id');
	}

	//function to check if bid is active
	public function isActive()
	{
		return $this->getDeal->available;
	}

	//function to check if bid is the top bid
	public function isTop()
	{
		$deal = $this->getDeal->getBids->orderBy('price', 'desc')
					->take(1)->get();
		return $this == $deal;
	}
}














