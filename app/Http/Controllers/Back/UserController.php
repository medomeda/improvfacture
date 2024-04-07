<?php

namespace App\Http\Controllers\Back;

use App\Models\Role;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        // if(request()->ajax()){
    
          
        //     $query = User::query();
        //     $table = Datatables::of($query->get());
        //     //$table->addColumn('checkbox', '<input type="checkbox" name="item_id[]" />');
        //     $table->addColumn('actions', ' ');
        //     $table->editColumn('actions', function ($row) {
        //         $viewGate      = 'book_show';
        //         $editGate      = 'book_edit';
        //         $deleteGate    = 'book_delete';
        //         $crudRoutePart = 'users';

        //         return view('partials.datatablesActions2', compact(
        //             /*'viewGate',
        //             'editGate',
        //             'deleteGate',*/
        //             'crudRoutePart',
        //             'row'
        //         ));
        //     });
        //     $table->rawColumns(['actions']);
        
        //     return $table->make(true);

        // }

        $users = User::orderBy('id','ASC')->paginate(10);
        return view('back.users.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function index2(UsersDataTable $userDataTable)
    {

        return $userDataTable->render('back.users.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return view('back.users.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $user = new User();
        return view('back.users.create',compact('user','roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if($request->has('photouser')) {
            $fileUid = $request->photouser->store('/users', 'public');
            $input['photo'] = $fileUid;
        }

        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('admin.users.index')
                        ->with('success','Utilisateur crée avec succès!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('back.users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','id')->all();
        $userRole = $user->roles->pluck('name','name')->all();


        return view('back.users.edit',compact('user','roles','userRole'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }

        $user = User::find($id);

        //Image
        $fileUid = null;
        if($request->has('photouser')) {
        
            Storage::disk('public')->delete($user->photo);
            $fileUid = $request->photouser->store('/users', 'public');
            $input['photo'] = $fileUid;
        }
        
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));


        return redirect()->route('admin.users.index')
                        ->with('success','Utilisateur modifié avec succès!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->route('admin.users.index')->with('success','Utilisateur supprimé avec succès!');   
        } catch(\Exception $exception){
            //dd($exception);
            $errormsg = 'Erreur suppression utilisateur ' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            //Outlet::where('creator_id', $id)->delete();
            User::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Utilisateur supprimé avec succès!'
            ]);

        } catch(\Exception $exception){
            
            //$errormsg = 'No Customer to de!' . $exception->getCode();
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression !',
                'data' => $exception->getMessage()
            ]);
        }
    }

    
}
