<?php namespace App\Http\Controllers;

use App\AssetLocation;
use Illuminate\Http\Request;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('home');
	}

	public function display($id=null)
	{
		if($id == 'ccp') {
			$assetLocation 		= AssetLocation::whereLocationId(1)->whereNotNull('offsetX')->whereNotNull('offsetY')->get();
			$availableAssets 	= AssetLocation::whereLocationId(1)->whereNull('offsetX')->whereNull('offsetY')->get();

			return view('room.ccp', [
				'assetsLocations' => $assetLocation,
				'availableAssets' => $availableAssets
			]);
		}

		if($id == 'ucc') {
			$assetLocation 		= AssetLocation::whereLocationId(2)->whereNotNull('offsetX')->whereNotNull('offsetY')->get();
			$availableAssets 	= AssetLocation::whereLocationId(2)->whereNull('offsetX')->whereNull('offsetY')->get();

			return view('room.ucc', [
				'assetsLocations' => $assetLocation,
				'availableAssets' => $availableAssets
			]);
		}

		return abort(404);
	}

	public function store(Request $request)
	{
		$assetLocation              = AssetLocation::whereId($request->input('id'))->first();
		$assetLocation->location_id = $request->input('location_id');
		$assetLocation->offsetX     = $request->input('offsetx');
		$assetLocation->offsetY     = $request->input('offsety');
		$assetLocation->save();
		return redirect()->back();
	}
}
