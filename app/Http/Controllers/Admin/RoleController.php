<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $repository;

    public function __construct(Role $role)
    {
         $this->repository = $role;
         $this->middleware(['can:roles']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $roles = Role::all();
        return view('admin.pages.roles.index',[
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();

        return redirect()->route('roles.index')->with('message', 'Permissão criada com sucesso!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$role = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        return view('admin.pages.roles.edit', ['role' => $role]);
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
        $role = Role::where('id', $id)->first();
        $role->name = $request->name;
        $role->save();

        return redirect()->route('roles.index')->with('message', 'Permissão atualizada com sucesso!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('id', $id)->first();
        $role->delete();

        return redirect()->route('roles.index')->with('error', 'Categoria excluído com sucesso.');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $roles = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('name', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.roles.index', compact('roles', 'filters'));
    }

    public function permissions($role)
    {
       
        $role = Role::where('id', $role)->first();
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            if($role->hasPermissionTo($permission->name)){
                $permission->can = true;
            } else {
                $permission->can = false;
            }
        }

        return view('admin.pages.roles.permissions',[
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function permissionsSync(Request $request, $role)
    {
        $permissionsRequest = $request->except(['_token', '_method']);

        foreach($permissionsRequest as $key => $value){
            $permissions[] = Permission::where('id', $key)->first();
        }

        $role = Role::where('id', $role)->first();
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions(null);
        }

        return redirect()->route('role.permissions', ['role' => $role->id]);
    }
}
