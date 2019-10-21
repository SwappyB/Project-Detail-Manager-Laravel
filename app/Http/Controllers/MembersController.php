<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use DB;
use Carbon\Carbon;


class MembersController extends Controller
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
        $members=DB::select('Select * from members order by created_at desc');
        return view('member.index')->with('members',$members);
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:members',
            'branch' => 'required|max:255',
            'year' => 'required',
            'email' => 'required|email|unique:members',
            'phoneNumber' => 'required|unique:members',
        ]);
        
        $created_at= Carbon::now()->toDateTimeString();

        DB::insert('insert into members (name, branch, year, email, phoneNumber, created_at)
         values (?, ?, ?, ?, ?, ?)', [$request->input('name'), $request->input('branch'), $request->input('year')
         ,$request->input('email'),$request->input('phoneNumber'), $created_at]);

        return redirect('/member')->with('success', 'Member Added');
    }

    public function show($id)
    {
        $data['members'] = DB::select('SELECT * FROM members where mid= ?',[$id]);
        $data['projects'] =DB::select('select p.pid,p.title,p.datestarted,p.status,p.created_at from members m,works w,projects p where m.mid = ? and w.mid=m.mid and p.pid=w.pid', [$id]);
        return view('member.show')->with('data', $data);
    }

    public function edit($id)
    {
        $members = DB::select('SELECT * FROM members where mid= ?',[$id]);
        return view('member.edit')->with('members', $members);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'branch' => 'required|max:255',
            'year' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required',
        ]);
        $updated_at= Carbon::now()->toDateTimeString();

        $affected = DB::update('update members set name=?, branch=?, year=?, email=?, phoneNumber=?, updated_at=? where mid=?',
        [$request->input('name'), $request->input('branch'), $request->input('year')
         ,$request->input('email'),$request->input('phoneNumber'), $updated_at, $id]);
        
        if ($affected) {
            return redirect()->route('member.show', ['id' => $id])->with('success', 'Details Updated');
        }
        return redirect()->route('member.show', ['id' => $id])->with('error', 'Failed!');
    }
    public function destroy($id)
    {
        $affectedd = DB::delete('delete from works where mid = ?', [$id]);
        $affected = DB::delete('delete from members where mid = ?', [$id]);
        if ($affected) {
            return redirect()->route('member.index')->with('success', 'Member Deleted');
        }
        return redirect()->route('member.show', ['id' => $id])->with('error', 'Failed!');
    }
}
