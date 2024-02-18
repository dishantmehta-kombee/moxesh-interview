<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {

//            dd(auth()->user()->can('role-list'));
//            $roles = Role::orderBy('id', 'asc')->select('id', 'name')->get()->toArray();
//            return view('roles.index', compact('roles'));

            if ($request->ajax()) {
                $data = Role::select('id', 'name', 'created_at')->latest()->get();
                return Datatables::of($data)
                    ->addColumn('created_at', function ($row) {
                        // Format the date in Indian date format (DD-MM-YYYY)
                        return date('d-m-Y', strtotime($row->created_at));
                    })
                    ->addColumn('action', function ($row) {
                        $btn = '';
                        if (!Gate::denies('role-edit')) {
                            $btn .= '<a href="' . route('roles.edit', ['id' => $row->id]) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                        }
                        if (!Gate::denies('role-delete')) {
                            $delete_url = route('roles.destroy', ['id' => $row->id]);
                            $btn .= '&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteRecordData(`' . $delete_url . '`)" class="delete destroy btn btn-danger btn-sm">Delete</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('roles.index');

        } catch (Exception $e) {
            Log::error("RoleController.php : index() : Exception", ["Exception" => $e->getMessage(), "\nTraceAsString" => $e->getTraceAsString()]);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $all_permissions = Permission::all();
            return view('roles.create', compact('all_permissions'));
        } catch (Exception $e) {
            Log::error("Error in create method of RoleController: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error occurred while loading role creation page.');
        }
    }


    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required|array|min:1',
            ]);
            $role = Role::create(['name' => $request->input('name')]);
            $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('name');
            $role->syncPermissions($permissions);
            auth()->user()->syncPermissions($permissions);

            return response()->json(['status' => 200, 'message' => 'Roles created successfully.']);
        } catch (Exception $e) {
            Log::error("Error in store method of RoleController: " . $e->getMessage());
            return response()->json(['status' => 201, 'message' => 'Something went wrong.']);
        }
    }

    public function edit($id)
    {
        try {
            $role = Role::find($id);
            $all_permissions = Permission::all();
            $rolePermissions = $role->permissions->pluck('id')->toArray();

            return view('roles.edit', compact('role', 'all_permissions', 'rolePermissions'));
        } catch (Exception $e) {
            Log::error("Error in edit method of RoleController: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error occurred while editing role.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required|unique:roles,name,' . $id, // Ensure name is unique except for the current role
                'permission' => 'required|array|min:1',
            ]);

            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('name');
            $role->syncPermissions($permissions);
            auth()->user()->syncPermissions($permissions);

            return response()->json(['status' => 200, 'message' => 'Roles updated successfully.']);
        } catch (Exception $e) {
            Log::error("Error in update method of RoleController: " . $e->getMessage());
            return response()->json(['status' => 201, 'message' => 'Something went wrong.']);
        }
    }

    public function show($id): View
    {
        try {
            $role = Role::find($id);
            $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
                ->where("role_has_permissions.role_id", $id)
                ->get();

            return view('administration.roles.role-show', compact('role', 'rolePermissions'));
        } catch (Exception $e) {
            Log::error("Error in show method of RoleController: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error occurred while displaying role.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table("roles")->where('id', $id)->delete();
//            return redirect()->route('role.list')->with('success', 'Role deleted successfully');
            return response()->json(['status' => 200, 'message' => 'Permission delete successfully.']);
        } catch (Exception $e) {
            Log::error("Error in destroy method of RoleController: " . $e->getMessage());
//            return redirect()->back()->with('error', 'Error occurred while deleting role.');
            return response()->json(['status' => 201, 'message' => 'Something went wrong.']);
        }
    }
}
