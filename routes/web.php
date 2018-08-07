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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/vacation','VacationsController@'
Route::resource('vacations','VacationsController');

/*Route::get('/vacation', function () {
    return view('vacations/new_vacation');
});*/
Route::post('/editStatus',function(\Illuminate\Http\Request $request){

	//return  response()->json(['message'=>$request['cmd']]);
	$vacation=App\Vacation::find($request['vacation_id']);
        $cmd=$request['cmd'];
        $prevStatus=$vacation->status;

        
        if(($prevStatus=='managerConfirmed'&&$cmd=='hrConfirmed')||
        	($prevStatus=='hrConfirmed'&&$cmd=='managerConfirmed'))
        	$vacation->status='confirmed';
        else
        	$vacation->status=$cmd;
        $vacation->update();
        return response()->json(['message'=>'updated successfully','status'=>$vacation->status]);
	


})->name('editStatus');

/*Route::post('/editStatus',[

'uses'=>'VacationsController@editVacationStatus',
'as'=>'editStatus'
]);*
