<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Models\Customer;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:supplier-list', ['only' => ['index']]);
        $this->middleware('permission:supplier-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:supplier-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:supplier-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Supplier::latest()->get();
            return Datatables::of($data)
                ->addColumn('status', function ($row) {
                    // If status is 1, generate an active badge, otherwise, generate an inactive badge
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-secondary">Inactive</span>';
                    }
                })
                ->addColumn('created_at', function ($row) {
                    // Format the date in Indian date format (DD-MM-YYYY)
                    return date('d-m-Y', strtotime($row->created_at));
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (!Gate::denies('supplier-edit')) {
                        $btn .= '<a href="' . route('suppliers.edit', ['id' => $row->id]) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    }
                    if (!Gate::denies('supplier-delete')) {
                        $delete_url = route('suppliers.destroy', ['id' => $row->id]);
                        $btn .= '&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteRecordData(`' . $delete_url . '`)" class="delete destroy btn btn-danger btn-sm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('suppliers.index');
    }

    public function create()
    {
        return view('suppliers.create');

    }

    public function store(StoreSupplierRequest $request)
    {
        $customer = new Supplier();
        $customer->name = $request->name;
        $customer->status = $request->status;
        $customer->save();

        return response()->json(['message' => 'Supplier created successfully', 'customer' => $customer]);
    }

    public function edit($id)
    {
        try {
            $customer = Supplier::find($id);
            return view('suppliers.edit', compact('customer'));

        } catch (Exception $e) {
            Log::error("Error in edit method of SupplierController: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error occurred while editing role.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $messages = [
                'name.required' => 'The name field is required.',
                'status.required' => 'The status field is required.',
                'status.in' => 'The status field must be either 0 or 1.',
            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'status' => 'required|in:0,1',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->first()], 422);
            }

            $customer = Supplier::find($id);
            $customer->name = $request->name;
            $customer->status = $request->status;
            $customer->save();

            return response()->json(['status' => 200, 'message' => 'Supplier updated successfully.']);
        } catch (Exception $e) {
            Log::error("Error in update method of SupplierController: " . $e->getMessage());
            return response()->json(['status' => 201, 'message' => 'Something went wrong.']);
        }
    }

    public function destroy($id)
    {
        try {
            DB::table("suppliers")->where('id', $id)->delete();
//            return redirect()->route('role.list')->with('success', 'Supplier deleted successfully');
            return response()->json(['status' => 200, 'message' => 'Supplier delete successfully.']);
        } catch (Exception $e) {
            Log::error("Error in destroy method of SupplierController: " . $e->getMessage());
//            return redirect()->back()->with('error', 'Error occurred while deleting role.');
            return response()->json(['status' => 201, 'message' => 'Something went wrong.']);
        }
    }
}
