<?php



use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function(){
	Route::post('/api/v1/activate', function () {

		$user = \Sentinel::activate(['email'=>Input::get('email'),'password'=>Input::get('password')]);

		if(!$user){
			return response()->jsoon(['body'=>error],401);
		}
		return response()->json(['body'=>$user],200) ;
	});

	Route::post('/api/v1/login', function () {

		$user = \Sentinel::authenticate(['email'=>Input::get('email'),'password'=>Input::get('password')], true);

		if(!$user){
			return response()->jsoon(['body'=>'error'],401);
		}
	    return response()->json(['body'=>$user],200) ;
	});

		Route::get('/api/v1/logout', function () {

			$user = Sentinel::logout();
			if(!$user){
				return response()->jsoon(['body'=>'error'],401);
			}
			return response()->json(['body'=>$user],200) ;
		});
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
		Route::get('/api/v1/users', ['middleware' => ['web','api.auth'], function () {

				$user = \Sentinel::getUser();
			return response()->json(['body'=>$user],200) ;
		}]);
// Route::group(['prefix'=>'/api/v1','middleware' => ['api']], function () {
// //	Route::group(['middleware' => ['web']], function(){
// 		Route::get('/users', function () {
// 			$user = \Sentinel::getUser();
// 			return response()->json(['body'=>$user],200) ;
// 		});
// //	});
// });
