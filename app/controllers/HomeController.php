<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		$personnel = Personnel::all();

		foreach ($personnel as $contact) {
			$futures = $contact->futures;
			foreach ($futures as $future) {
				if ($future->start_date == date('n/j/Y')) {
					$contact->status = $future->status;
					$contact->comment = $future->comment;
					$contact->returning_date = $future->end_date;
					$contact->returning_time = $future->end_time;
					$contact->save();
					$future->delete();
				}
			}
		}
		return View::make('personnel',compact('personnel'));
	}



	public function getStatusForm($id)
	{
		$contact = Personnel::find($id);
		return View::make('forms.status',compact('contact'));
	}


	public function postStatusForm()
	{
		$contact = Personnel::find(Input::get('contact_id'));

		$date = '';
		$time = '';

		if (Input::get('returning_date')) {
			$datetime = new DateTime(Input::get('returning_date'));
			$date = $datetime->format('n/j/Y');
			$time = $datetime->format('h:i a');
		}

		$contact->status = Input::get('status');
		$contact->comment = Input::get('comment');
		$contact->returning_date = $date;
		$contact->returning_time = $time;
		$contact->save();

		return Redirect::back();
	}


	public function getFutureForm($id)
	{
		$contact = Personnel::find($id);
		$futures = $contact->futures;
		return View::make('forms.future',compact('contact','futures'));
	}


	public function postFutureForm()
	{
		$contact = Personnel::find(Input::get('contact_id'));

		$start_date = '';
		$start_time = '';

		$end_date = '';
		$end_time = '';

		if (Input::get('leaving_date')) {
			$datetime = new DateTime(Input::get('leaving_date'));
			$start_date = $datetime->format('n/j/Y');
			$start_time = $datetime->format('h:i a');
		}

		if (Input::get('returning_date')) {
			$datetime = new DateTime(Input::get('returning_date'));
			$end_date = $datetime->format('n/j/Y');
			$end_time = $datetime->format('h:i a');
		}

		$future = new Future;
		$future->user_id = $contact->id;
		$future->status = Input::get('status');
		$future->comment = Input::get('comment');
		$future->start_date = $start_date;
		$future->start_time = $start_time;
		$future->end_date = $end_date;
		$future->end_time = $end_time;
		$future->save();

		$futures = $contact->futures;
		return View::make('forms.future',compact('contact','futures'));
	}


	public function deleteFuture($id)
	{
		$future = Future::find($id);

		$contact = $future->personnel;

		$future->delete();

		$futures = $contact->futures;

		return View::make('forms.future',compact('contact','futures'));
	}


	public function getEditFutureForm($id)
	{
		$future = Future::find($id);
		return View::make('forms.future-edit',compact('future'));
	}


	public function putEditFutureForm($id)
	{
		$start_date = '';
		$start_time = '';

		$end_date = '';
		$end_time = '';

		if (Input::get('leaving_date')) {
			$datetime = new DateTime(Input::get('leaving_date'));
			$start_date = $datetime->format('n/j/Y');
			$start_time = $datetime->format('h:i a');
		}

		if (Input::get('returning_date')) {
			$datetime = new DateTime(Input::get('returning_date'));
			$end_date = $datetime->format('n/j/Y');
			$end_time = $datetime->format('h:i a');
		}

		$future = Future::find($id);
		$future->status = Input::get('status');
		$future->comment = Input::get('comment');
		$future->start_date = $start_date;
		$future->start_time = $start_time;
		$future->end_date = $end_date;
		$future->end_time = $end_time;
		$future->save();

		$contact = $future->personnel;

		$futures = $contact->futures;

		return View::make('forms.future',compact('contact','futures'));
	}

}