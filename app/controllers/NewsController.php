<?php

class NewsController extends BaseController {

	//get $ post requests for news
	public function getANews(News $news)
	{
		$comment = new Comment;
		return View::make('pages.blogs.blogs')
				->with('a_news', $news)
				->with('comment', $comment)
				->with('for', 'a_post');
	}

	public function getAllNews()
	{
		$first_news = News::first();
		$other_news = News::where('id', '>', 1)
				->get();
		return View::make('pages.blogs.blogs')
				->with('first_news', $first_news)
				->with('other_news', $other_news)
				->with('for', 'all_posts');
	}

	public function getMyNews($id)
	{
		$first_news = News::where('user_id', '=', $id )
				->first();
		if(isset($first_news))
		{
			$other_news = News::where('user_id', '=', $id )
					->where('id', '>', $first_news->id)
					->get();
			return View::make('pages.blogs.blogs')
					->with('first_news', $first_news)
					->with('other_news', $other_news)
					->with('for', 'my_posts');
		}
		else
		{
			return View::make('pages.blogs.blogs')
					->with('first_news', $first_news)
					->with('for', 'my_posts');
		}
	}
	
	public function makeNews()
	{
		$news = new News;
		return View::make('pages.blogs.blogging')
				->with('news', $news)
				->with('method', 'post');
	}
	
	public function getEditNews(News $news)
	{
		return View::make('pages.blogs.blogging')
				->with('news', $news)
				->with('method', 'put');	}

	public function getDeleteNews(News $news)
	{
		return View::make('pages.blogs.blogging')
				->with('news', $news)
				->with('method', 'delete');	
	}

	public function postCreateNews()
	{
		$validator = Validator::make(Input::all(), News::$rules);
		
		if($validator->fails())
		{
			return Redirect::route('create_news')->withErrors($validator->messages());
		}
		else
		{
			$a_news = new News;
			$image = Input::file('pic_url');
			$imagename = time()."-".$image->getClientOriginalName();
	       	Image::make($image->getRealPath())->resize(200, 200)->save(public_path().'/images/'. $imagename);
			$a_news->user_id = Auth::user()->id;
	       	$a_news->pic_url = 'images/'.$imagename;
	       	$a_news->title = Input::get('title');
	       	$a_news->content = Input::get('content');
	       	$a_news->save();
	    }

	    if($a_news)
	    {
			return Redirect::route('my_news', array(Auth::user()->id))->withErrors('Blog Post successfully created!');	    
		}
		else
		{
			return Redirect::back()->withErrors('Deal unsuccessfully created...... You have to retry.');
		}
	}
	
	
	public function postEditNews(Deal $deal)
	{
		$deal -> update(Input::all());
		return Redirect::route('my_news', array(Auth::user()->id));
	}

	public function postDeleteNews()
	{
		$deal -> delete();
		return Redirect::route('my_news', array(Auth::user()->id));
	}
}

?>