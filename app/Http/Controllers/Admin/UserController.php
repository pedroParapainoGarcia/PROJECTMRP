<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.usuarios.index')->only('index');
        $this->middleware('can:admin.usuarios.create')->only('create');
        $this->middleware('can:admin.usuarios.edit')->only('edit', 'update');
        $this->middleware('can:admin.usuarios.destroy')->only('destroy');
    }

    public function index()
    {
        $usuarios = User::all();
        $roles = Role::all();

        return view('admin.usuarios.index', compact('usuarios'));
    }


    public function create()
    {
        $roles = Role::all();

        return view('admin.usuarios.crear', compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.usuarios.index', $user);
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles=Role::all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.usuarios.editar',compact('user','roles','userRole'));
    }


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
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
        
    
        return redirect()->route('admin.usuarios.index');
    }


    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();
        return redirect()->route('admin.usuarios.index');
    }
}
