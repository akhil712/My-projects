<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = User::where('admin',false)->get();
        return view('customerIndex',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = User::find($id);
        if ($customer) {
            if ($customer->approved) {
                $msg = 'Customer approved successfully.';
            }
            else{
                $msg = 'Customer rejected';
            }
            $customer->approved = !$customer->approved;
            $customer->save();
            return response()->json(['success' => true, 'message' => 'Customer approved successfully.','approved' => (bool)$customer->approved]);
        }
        return response()->json(['success' => false, 'message' => 'Customer not found.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
