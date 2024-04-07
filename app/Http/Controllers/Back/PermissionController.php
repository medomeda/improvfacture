<?php

namespace App\Http\Controllers\Back;


use App\Helpers\Tools;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function __construct() {
        
        //$this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
        
        $permissions = Permission::paginate(10); //Get all permissions

        return view('back.permissions.index')->with('permissions', $permissions);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
     
        $permission = new Permission();
        $roles = Role::get(); //Get all roles
        return view('back.permissions.create',compact('permission','roles'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission'. $permission->name.' ajoutée!');

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        //return redirect('permissions');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {

        $permission = Permission::with('roles')->findOrFail($id);
        $roles = Role::get();
        return view('back.permissions.edit', compact('permission','roles'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        //$input = array_except($input,array('roles'));
        $permission->fill($input)->save();

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission'. $permission->name.' modifiée!');

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $permission = Permission::findOrFail($id);

        //Make it impossible to delete this specific permission    
        if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('admin.permissions.index')
            ->with('success', 'Cannot delete this Permission!');
        }

        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission supprimée!');

    }

    /*private function getWebRoutesPermissions()
    {
        dd(Route::getRoutes()->getRoutes()[85]);

        $permission_ids = []; // an empty array of stored permission IDs
        $permission_liste =[];
        // iterate though all routes
        foreach (Route::getRoutes()->getRoutes() as $key => $route)
        {
            // get route action
            $action = $route->getActionname();
            // separating controller and method
            $_action = explode('@',$action);
            
            $controller = $_action[0];
            $method = end($_action);
            $permission_name = $controller. '_'. $method;

            $permission_liste [] =  $permission_name;
            
            // check if this permission is already exists
            //$permission_check = Permission::where(
            //        ['controller'=>$controller,'method'=>$method]
            //    )->first();

            $permission_check = Permission::where('name', $permission_name)->first();
                
            /*if(!$permission_check){
                $permission = new Permission;
                //$permission->controller = $controller;
                //$permission->method = $method;
                $permission->name = $permission_name;
                $permission->save();
                // add stored permission id in array
                $permission_ids[] = $permission->id;
            }*/
    //    }

    //    dd($permission_liste);
    
    //}
}
