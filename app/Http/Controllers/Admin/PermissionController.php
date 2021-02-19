<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    private $repository;

    public function __construct(Permission $permission)
    {
         $this->repository = $permission;
         $this->middleware(['can:permissions']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $permissions = Permission::all();
        return view('admin.pages.permissions.index',[
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permissions.index')->with('message', 'Permissão criada com sucesso!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::where('id', $id)->first();
        return view('admin.pages.permissions.edit', ['permission' => $permission]);
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
        $permission = Permission::where('id', $id)->first();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permissions.index')->with('message', 'Permissão atualizada com sucesso!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::where('id', $id)->first();
        $permission->delete();

        return redirect()->route('permissions.index')->with('error', 'Permissão excluído com sucesso.');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $permissions = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('name', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.permissions.index', compact('permissions', 'filters'));
    }
}