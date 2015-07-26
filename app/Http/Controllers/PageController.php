<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class PageController extends Controller {
	public function index()
	{
		return view('welcome');
	}

	public function impressum()
	{
		return view('impressum');
	}

	public function kontakt()
	{
		return view('kontakt');
	}

	public function sendKontakt(Request $request)
	{
		$rules = array(
			'email'     => 'Required|Between:3,64|Email',
			'message'   => 'Required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()) {
			Mail::send('emails.kontakt.default', array('data' => Input::all()), function($message) {
				$message->from('info@dirk-helbert.de', 'Laravel Anfänger Tutorial');
				$message->to('info@dirk-helbert.de', 'Dirk Helbert')->subject('Nur ein Test');
			});
			return Redirect::action('PageController@kontakt')->with('sendsuccess', 1);
		} else {
			return Redirect::action('PageController@kontakt')->withInput()->withErrors($validator);
		}
	}
}