<?php
namespace Dataview\IOUser;

use Dataview\IntranetOne\IOController;
use Illuminate\Http\Response;

use App\User;
use App\Http\Requests;
use Dataview\IOUser\UserRequest;
use Sentinel;
use DataTables;

class UserController extends IOController{

	public function __construct(){
    	$this->service = 'user';
	}

  	public function index(){
		return view('User::index');
	}
	
	public function list(){
		$query = User::select('id','email', 'first_name', 'last_name')
		->with('roles')
		->get();

		$query->map(function ($q) {
			$sentinelUser = Sentinel::findUserById($q->id);
			if($sentinelUser->inRole('admin'))
				$q['admin'] = true;
			else
				$q['admin'] = false;

			return $q;
		});

		return Datatables::of($query)->make(true);
	}

	public function create(UserRequest $request){
		dump($request->all());
		// $check = $this->__create($request);
		// if(!$check['status'])
		//   return response()->json(['errors' => $check['errors'] ], $check['code']);	
		
		// $user = Sentinel::registerAndActivate($request->all());
		// $user->save();

		// if($request->all()['__admin']){
		// 	$adminRole = Sentinel::findRoleBySlug('admin');
		// 	$adminRole->users()->attach($user);	
		// }else{
		// 	$userRole = Sentinel::findRoleBySlug('user');
		// 	$userRole->users()->attach($user);
		// }
	
		// return response()->json(['success'=>true,'data'=>null]);
	}
}
