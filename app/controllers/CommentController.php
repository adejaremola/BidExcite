<?php

class CommentController extends BaseController {

	
	//get $ post requests for comments
	public function getComments($id)
	{
		$comments = Comment::where('user_id', '=', $id )
						->get();
		return View::make('pages.comments.comments')
						->with('comments', $comments);
	}

	public function postCreateComment()
	{
		$validator = Validator::make(Input::all(), Comment::$rules);
		
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator->messages());
		}
		else
		{
			$comment = new Comment;
			$comment->user_id = Auth::user()->id;
			$comment->news_id = Input::get('news_id');
	       	$comment->content = Input::get('content');
	       	$comment->save();
	    }

	    if($comment)
	    {
	    	$user = $comment->getNews->getUser;
			$user->newNotification()
			    ->withType('PostCommented')
			    ->withSubject('Your post has recieved a comment.')
			    ->withBody(Auth::user()->first_name.' has commented on your blog post!')
			    ->regarding($comment)
			    ->deliver();
			return Redirect::route('a_news', array($comment->getNews->id))
				->withErrors('Blog Post successfully created!');	    
		}
		else
		{
			return Redirect::back()->withErrors('Deal unsuccessfully created...... You have to retry.');
		}
	}
	

}