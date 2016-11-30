<?php

class BidController extends BaseController {

	

	//get $ post requests for bids

	public function getBids()
	{	
		$deals = Deal::all();
		$user = Auth::user();
		return View::make('pages.bids.bidshome')
			->with('deals', $deals)
			->with('user', $user);
	}

	public function createBid($id)
	{
		$deal = Deal::find($id);
		$bid = new Bid;
		return View::make('pages.bids.bidding')
				->with('method', 'post')
				->with('deal', $deal)
				->with('bid', $bid);
	}

	
	public function editBid(Bid $bid)
	{
		$deal = $bid->getDeal;
		return View::make('pages.bids.bidding')
				->with('method', 'put')
				->with('deal', $deal)
				->with('bid', $bid);
	}

	public function deleteBid(Bid $bid)
	{
		$deal = $bid->getDeal;
		return View::make('pages.bids.bidding')
				->with('method', 'delete')
				->with('deal', $deal)
				->with('bid', $bid);
	}

	public function createdBid()
	{	
		$validator = Validator::make(Input::all(), Bid::$rules);
		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator->messages()->first());
		}
		else
		{
			$bid = new Bid;
			$bid->user_id = Auth::user()->id;
			$bid->item_id = Input::get('item_id');
			$bid->price = Input::get('price');
			$bid->save();
		}
		if($bid)
		{
			return Redirect::to('deals');
		}
	}

	public function editedBid(Bid $bid)
	{
		$validator = Validator::make(Input::all(), Bid::$rules);
		if(!$validator)
		{
			return Redirect::back()
					->withErrors($validator->messages()->first());
		}
		else
		{
			$bid -> update(['price' => Input::get('price')]);
			return Redirect::to('deals');
		}
	}

	public function deletedBid(Bid $bid)
	{
		$bid -> delete();
		return Redirect::to('deals');
	}

	public function acceptedBid(Bid $bid)
	{
		if($bid->accepted == 0)
		{
			$bid->accepted = 1;
			$bid->update();
			$bid->getDeal->available = 0;
			$bid->getDeal->update();
			return Redirect::back();
		}

	}
	

	

}