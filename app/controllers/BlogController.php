<?php

class BlogController extends BaseController {

	//get $ post requests for news
	public function getABlog(Blog $blog)
	{
		$comment = new Comment;
		return View::make('pages.blogs.blogs')
				->with('a_blog', $blog)
				->with('comment', $comment)
				->with('for', 'a_post');
	}

	public function getAllBlogs()
	{
		$first_blog = Blog::first();
		$other_blogs = Blog::where('id', '>', 1)
				->get();
		return View::make('pages.blogs.blogs')
				->with('first_blog', $first_blog)
				->with('other_blogs', $other_blogs)
				->with('for', 'all_posts');
	}

	public function getMyBlogs($id)
	{
		$first_blog = Blog::where('user_id', '=', $id )
				->first();
		if(isset($first_blog))
		{
			$other_blogs = Blog::where('user_id', '=', $id )
					->where('id', '>', $first_blog->id)
					->get();
			return View::make('pages.blogs.blogs')
					->with('first_blog', $first_blog)
					->with('other_blogs', $other_blogs)
					->with('for', 'my_posts');
		}
		else
		{
			return View::make('pages.blogs.blogs')
					->with('first_blog', $first_blog)
					->with('for', 'my_posts');
		}
	}
	
	public function makeBlog()
	{
		$blog = new Blog;
		return View::make('pages.blogs.blogging')
				->with('blog', $blog)
				->with('method', 'post');
	}
	
	public function getEditBlog(Blog $blog)
	{
		return View::make('pages.blogs.blogging')
				->with('blog', $blog)
				->with('method', 'put');	}

	public function getDeleteNews(Blog $blog)
	{
		return View::make('pages.blogs.blogging')
				->with('blog', $blog)
				->with('method', 'delete');	
	}

	public function postCreateBlog()
	{
		$validator = Validator::make(Input::all(), Blog::$rules);
		
		if($validator->fails())
		{
			return Redirect::route('create_blog')->withErrors($validator->messages());
		}
		else
		{
			$a_blog = new Blog;
			$image = Input::file('pic_url');
			$imagename = time()."-".$image->getClientOriginalName();
	       	Image::make($image->getRealPath())->resize(200, 200)->save(public_path().'/images/'. $imagename);
			$a_blog->user_id = Auth::user()->id;
	       	$a_blog->pic_url = 'images/'.$imagename;
	       	$a_blog->title = Input::get('title');
	       	$a_blog->content = Input::get('content');
	       	$a_blog->save();
	    }

	    if($a_blog)
	    {
			return Redirect::route('my_blog', array(Auth::user()->id))->withErrors('Blog Post successfully created!');	    
		}
		else
		{
			return Redirect::back()->withErrors('Deal unsuccessfully created...... You have to retry.');
		}
	}
	
	
	public function postEditBlog(Blog $blog)
	{
		$blog -> update(Input::all());
		return Redirect::route('my_blogs', array(Auth::user()->id));
	}

	public function postDeleteBlog()
	{
		$blog -> delete();
		return Redirect::route('my_blogs', array(Auth::user()->id));
	}
}

?>