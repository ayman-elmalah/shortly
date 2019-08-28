## About Phplite

phplite is a web application framework with lite size and most functionality, phplite will make the development easy and fast

## Documentation

## Downloading project
``
composer create-project --prefer-dist ayman-elmalah/phplite phplite
``

## Showing project
You can with easy way browse public directory to show project in browser

### Creating you new route
you can add any routes at routes directory in any file and it will be watced

``
Route::get($path, $callback);
``

``
Route::post($path, $callback);
``

- You can add get or post as http verb, the path can be any path you want as string
- callback can be callback function or controller with method

``
Route::get('home', function() {
    return "Hello world"
});
``

``
Route::get('home', HomeController@index);
``

### Wrap your route with middleware and prefix
``
Route::prefix('admin', function (){
    Route::middleware('Admin', function () {
        Route::get('home', 'HomeController@index')
    })
})
``

### Access model and return view at controller
``
public function index() {
    $users = User::get();
    return view('web.index', ['users' => $users]);
}
``

### And Finally you can use blade template engine
so the view file will be at views directory with .blade.php extension