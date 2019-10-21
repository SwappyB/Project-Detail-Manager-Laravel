<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;
use Carbon\Carbon;

class CustomersController extends Controller
{/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $customers=DB::select('Select * from customers order by created_at desc');
        return view('customer.index')->with('customers',$customers);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:customers',
            'industry' => 'required|max:255',
            'description' => 'required',
            'email' => 'required|email|unique:customers',
            'phoneNumber' => 'required|unique:customers',
            'address' => 'required|max:255',
        ]);
        
        $created_at= Carbon::now()->toDateTimeString();

        DB::insert('insert into customers (name, industry, description, email, phoneNumber, address, created_at)
         values (?, ?, ?, ?, ?, ?, ?)', [$request->input('name'), $request->input('industry'), $request->input('description')
         ,$request->input('email'),$request->input('phoneNumber'),$request->input('address'), $created_at]);

        return redirect('/customer')->with('success', 'Customer Added');
    }

    public function show($id)
    {
        $data['customers'] = DB::select('SELECT * FROM customers where cid= ?',[$id]);
        $data['projects'] = DB::select('select * from projects where cid = ? order by created_at desc', [$id]);
        // return $data;
        return view('customer.show')->with('data', $data);
    }

    public function edit($id)
    {
        $customers = DB::select('SELECT * FROM customers where cid= ?',[$id]);
        return view('customer.edit')->with('customers', $customers);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'industry' => 'required|max:255',
            'description' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required',
            'address' => 'required|max:255',
        ]);
        $updated_at= Carbon::now()->toDateTimeString();

        $affected = DB::update('update customers set name=?, industry=?, description=?, email=?, phoneNumber=?, address=?, updated_at=? where cid=?',
        [$request->input('name'), $request->input('industry'), $request->input('description')
         ,$request->input('email'),$request->input('phoneNumber'),$request->input('address'), $updated_at, $id]);
        
        if ($affected) {
            return redirect()->route('customer.show', ['id' => $id])->with('success', 'Details Updated');
        }
        return redirect()->route('customer.show', ['id' => $id])->with('error', 'Failed!');
    }

    public function destroy($id)
    {
        $projects = DB::select('select * from projects where cid = ?', [$id]);
        if($projects){
            return redirect()->route('customer.show', ['id' => $id])->with('error', 'Cannot delete customer as there are projects associated with it!');
        }
        $affected = DB::delete('delete from customers where cid = ?', [$id]);
        if ($affected) {
            return redirect()->route('customer.index')->with('success', 'Customer Deleted');
        }
        return redirect()->route('customer.show', ['id' => $id])->with('error', 'Failed!');
    }
}
