<?php  

class IndexController extends BaseController {

public function getIndex()
	{	
		$deals = Deal::take(3)
					->orderBy('id')
					->get();
		$news = News::take(6)
					->orderBy('updated_at', 'desc');
		return View::make('pages.index')
					->with('deals', $deals)
					->with('news', $news);
	}

}	