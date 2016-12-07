<?php

class DealController extends \BaseController {

	

	public function createDeal()
	{
		$deal = new Deal;
		return View::make('pages.deals.dealing')
			->with('method', 'post')
			->with('deal', $deal);
	}

	public function editDeal(Deal $deal)
	{
		return View::make('pages.deals.dealing')
			->with('deal', $deal)
			->with('method', 'put');
	}

	public function deleteDeal(Deal $deal)
	{
		return View::make('pages.deals.dealing')
			->with('deal', $deal)
			->with('method', 'delete');
	}



	public function getDeals($id)
	{
		$deals = Deal::where('user_id', '=', $id)->get();
								
		return View::make('pages.deals.dealshome')
			->with('deals', $deals)
			->with('for', 'my_deals');
	}

	public function getAllDeals()
	{
		$deals = Deal::all();
		return View::make('pages.deals.dealshome')
			->with('deals', $deals)
			->with('for', 'all_deals');
	}





	public function getDeal(Deal $deal)
	{
		$a_bid = Bid::where('deal_id', '=', $deal->id)->where('user_id', '=', Auth::user()->id)->first();
		return View::make('pages.deals.deal')
				->with('deal', $deal)
				->with('a_bid', $a_bid);
	}
	
	
	//post functions
	public function postCreateDeal()
	{
		$validator = Validator::make(Input::all(), Deal::$rules);
		
		if($validator->fails())
		{
			return Redirect::to('create_deal')->withErrors($validator->messages());
		}
		else
		{
			$deal = new Deal;
			$image = Input::file('pic_url');
			$imagename = time()."-".$image->getClientOriginalName();
	       	Image::make($image->getRealPath())->resize(200, 200)->save(public_path().'/images/'. $imagename);
			$deal->user_id = Auth::user()->id;
	       	$deal->pic_url = 'images/'.$imagename;
	       	$deal->title = Input::get('title');
	       	$deal->description = Input::get('description');
	       	$deal->price = Input::get('price');
	       	$deal->save();
	    }

	    if($deal)
	    {
			return Redirect::to('deals')->with('message', 'You have successfully registered!');	    
		}
		else
		{
			return Redirect::to('create_deal')->withErrors('Deal unsuccessfully created...... You have to retry.');
		}
	}


	public function postEditDeal(Deal $deal)
	{
		$deal -> update(Input::all());
		return Redirect::to('deals');	
	}

	public function postDeleteDeal(Deal $deal)
	{
		$deal -> delete();
		return Redirect::to('deals');	
	}

}
