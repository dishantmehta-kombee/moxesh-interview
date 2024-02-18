<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list', ['only' => ['index']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
//            $roles = Role::orderBy('id', 'asc')->select('id', 'name')->get()->toArray();
//            return view('roles.index', compact('roles'));

            if ($request->ajax()) {
                $data = Permission::select('id', 'name', 'created_at')->latest()->get();
                return Datatables::of($data)
                    ->addColumn('created_at', function ($row) {
                        // Format the date in Indian date format (DD-MM-YYYY)
                        return date('d-m-Y', strtotime($row->created_at));
                    })
                    ->addColumn('action', function ($row) {
                        $btn = '';
                        if (!Gate::denies('permission-edit')) {
                            $btn .= '<a href="' . route('permissions.edit', ['id' => $row->id]) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                        }
                        if (!Gate::denies('permission-delete')) {
                            $delete_url = route('permissions.destroy', ['id' => $row->id]);
                            $btn .= '&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteRecordData(`' . $delete_url . '`)" class="delete destroy btn btn-danger btn-sm">Delete</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('permissions.index');

        } catch (Exception $e) {
            Log::error("PermissionController.php : index() : Exception", ["Exception" => $e->getMessage(), "\nTraceAsString" => $e->getTraceAsString()]);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // List all permissions
    // public function index()
    // {
    //     try {
    //         $permissions = Permission::with('permissionType')->orderBy('name', 'asc')->get();
    //         return view('administration.permissions.index', compact('permissions'));
    //     } catch (Exception $e) {
    //         Log::error("PermissionController.php : index() : Exception", ["Exception" => $e->getMessage(), "\nTraceAsString" => $e->getTraceAsString()]);
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }

//    public function index()
//    {
//        try {
//            $permissions = DB::table('permissions')
//                ->join('permission_types', 'permissions.permission_type_id', '=', 'permission_types.id')
//                ->select('permissions.*', 'permission_types.type_name as permission_type_name')
//                ->orderBy('permissions.name', 'asc')
//                ->get();
//            return view('administration.permissions.index', compact('permissions'));
//        } catch (Exception $e) {
//            Log::error("PermissionController.php : index() : Exception", [
//                "Exception" => $e->getMessage(),
//                "\nTraceAsString" => $e->getTraceAsString()
//            ]);
//            return redirect()->back()->with('error', $e->getMessage());
//        }
//    }


    // Show form for creating a new permission
    public function create()
    {
        try {
            return view('permissions.create');
        } catch (Exception $e) {
            Log::error("PermissionController.php : create() : Exception", ["Exception" => $e->getMessage(), "\nTraceAsString" => $e->getTraceAsString()]);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Store a new permission
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|unique:permissions,name',
            ]);

            $permissionData = [
                'name' => $request->input('name'),
                'guard_name' => $request->input('guard_name', 'web'),
            ];

            Permission::create($permissionData);
            return response()->json(['status' => 200, 'message' => 'Permission created successfully.']);
        } catch (Exception $e) {
            Log::error("PermissionController.php : store() : Exception", ["Exception" => $e->getMessage(), "\nTraceAsString" => $e->getTraceAsString()]);
            return response()->json(['status' => 201, 'message' => 'Something went wrong.']);
        }
    }

    public function edit($id)
    {
        try {
            $permission_data = Permission::where('id', $id)->select('id', 'name')->first();
            return view('permissions.edit', compact('permission_data'));
        } catch (Exception $e) {
            Log::error("PermissionController.php : create() : Exception", ["Exception" => $e->getMessage(), "\nTraceAsString" => $e->getTraceAsString()]);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Store a new permission
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required|unique:permissions,name',
            ]);

            $permissionData = [
                'name' => $request->input('name'),
                'guard_name' => $request->input('guard_name', 'web'),
            ];

            Permission::where('id', $id)->update($permissionData);
            return response()->json(['status' => 200, 'message' => 'Permission update successfully.']);
        } catch (Exception $e) {
            Log::error("PermissionController.php : update() : Exception", ["Exception" => $e->getMessage(), "\nTraceAsString" => $e->getTraceAsString()]);
            return response()->json(['status' => 201, 'message' => 'Something went wrong.']);
        }
    }

    // Delete the specified permission
    public function destroy($id)
    {
        try {
            Permission::findById($id)->delete();
            return response()->json(['status' => 200, 'message' => 'Permission delete successfully.']);
        } catch (Exception $e) {
            Log::error("PermissionController.php : destroy() : Exception", ["Exception" => $e->getMessage(), "\nTraceAsString" => $e->getTraceAsString()]);
            return response()->json(['status' => 201, 'message' => 'Something went wrong.']);
        }
    }
}
