
<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Comment extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $table = 'comments';
	protected $fillable = array('user_id', 'news_id', 'content');
 
	public static $rules = array
	(
		'content' => 'required'
	);

	//reverse relationship with user model (createComment)
	public function getUser()
	{
		return $this->belongsTo('User', 'user_id');	
	}

	//reverse relationship with News model (makeComment)
	public function getNews()
	{
		return $this->belongsTo('News', 'news_id');
	}
}