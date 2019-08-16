<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



use App\User;

use Illuminate\Support\facades\Input;




//START 
Route::get('currency', 'HomeController@ajaxRequest');

Route::POST('currency', 'HomeController@calculateCurrency');
//END












Route::get('/project', 'ExchangerateController@index');


Route::get('/', function() {
return view('welcome');
});


Route::get('/todos', 'TodosController@index');

Route::get('/todos/{todo}', 'TodosController@show');

Route::get('new-todos', 'TodosController@create');

Route::post('store-todos', 'TodosController@store');

Route::get('todos/{todo}/edit', 'TodosController@edit');

Route::post('todos/{todo}/update-todos', 'TodosController@update');

Route::get('todos/{todo}/delete', 'TodosController@destroy');

Route::get('/new', 'ArrayController@index');


/*Route::get('/new', function() {


$url = storage_path() . "/json/Appcheck.json";

$strJsonFileContents = file_get_contents($url);



// Convert to array 
$array = json_decode($strJsonFileContents, true);



//echo '<pre>'; print_r($array);


//var_dump($array); // print array


 return view('todos.new', compact('array'));


});*/


















/*
Route::get('/r', function () {

$results = DB::select('select * from posts where is_admin = ?', [5]);


return $results;

});


Route::get('/update', function (){


$updated = DB::update('update posts set title ="updated title" where id = ?', [1]);

return $updated;

});


Route::get('/delete', function (){

$deleted = DB::delete('delete from posts where id = ?', [2]);
return $deleted;

});
*/
/*RAW SQL QUERIES END*/






/*ELEQUEST START*/


/*
use App\Post; //gets converted to posts as TB
Route::get('/read', function (){
$posts = Post::all();
	return $posts;

// foreach ($posts as $post){
// 	return $post->title;
// }
});
/*

Route::get('find', function (){
$data = Post::find(6);
//return $data->title;
return $data;
});


Route::get('/findwhere', function (){
$posts = Post::where('id', 8)->orderBy('title', 'desc')->take(1)->get();
return $posts;

});



Route::get('/findmore', function () {
$posts = Post::findOrFail(2);
return $posts;

});


Route::get('basicinsert', function() {

//$post = new Post;
$post = Post::find(2);


$post->title = 'chnage 5 eloquent';
$post->body = 'change 5 eloquent';
$post->is_admin = '34';

$post->save(); //basic insert save to database

});


Route::get('/create', function () {

Post::create(['title'=>'new title test', 'body'=>'test', 'is_admin'=>'14']);

});

Route::get('/update', function (){

Post::where('id', 10)->where('is_admin', 14)->update(['title'=>'THIS', 'body'=>'BODY2', 'is_admin'=>'67']);
// id and where condition 


});


Route::get('/delete', function () {

$post = Post::find(1);
$post->delete();

});

Route::get('/delete2', function (){

Post::destroy(4);
});

Route::get('/delete3', function () {

Post::destroy([2,5]);
//Post::where('is_admin', 0)->delete();
});

Route::get('/softdelete', function (){
	post::find(8)->delete();
});

Route::get('/readsoftdelete', function (){
//can see whats been deleted
	$post = Post::withTrashed()->where('id',7)->get();
	return $post;
});


Route::get('/restore', function (){
//restores the softdeleted record
Post::withTrashed()->where('is_admin', 24)->restore();
});


*/



/*ELEQUENT END*/

/*
Route::get('/AB', function () {
return "AB";
});

Route::get('/post/{id}/{name}', function($id, $name) {
return "Post number: " . $id. ' ' .$name;
});

Route::get('/example/name', array('as' => 'admin.home', function () {
$url = route('admin.home');
return $url;
}));
*/

//Route::get('/look/{id}/{name}', 'PostsController@contact');

//Route::get('/post/{id}/{name}', 'PostsController@test');

//Route::resource('posts', 'PostsController');


Auth::routes();


