<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;
use Carbon\Carbon;
use App\Customer;
use App\Member;
use App\Work;

class AddController extends Controller
{/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $data['project'] = DB::select('select * from projects where pid = ?', [$id]);
        $data['main'] = DB::select('select m.mid,m.name,w.job from members m,projects p, works w where m.mid=w.mid and p.pid=w.pid and p.pid=?',[$id]);
        return view('addMember.index')->with('data',$data);
    }
    public function create($id){
        $data['members'] = DB::select('select m.mid,m.name,w.pid from members m left join works w on w.mid=m.mid and w.pid=?',[$id]);
        $data['id']=$id;
        return view('addMember.create')->with('data',$data);
    }
    public function edit($id,$pid)
    {
        $data['main'] = DB::select('select w.mid,w.job,w.pid,m.name from works w inner join members m on w.pid = ? and w.mid=? and w.mid=m.mid',[$pid,$id]);
        return view('addMember.edit')->with('data', $data);
    }
    public function store(Request $request,$id)
    {
        $this->validate($request, [
            'member' => 'required',
            'job' => 'required',
        ]);
        DB::insert('insert into works values (?, ?, ?)',  [$request->input('member'),$id,$request->input('job')]);
        return redirect()->route('addMember.index', ['id' => $id])->with('success', 'Member Added!');
    }
    public function update(Request $request,$id,$pid)
    {
        $this->validate($request, [
            'job' => 'required',
        ]);
        $affected = DB::update('update works set job = ? where pid = ? and mid = ?', [$request->input('job'),$pid, $id]);
       
        if ($affected) {
           return redirect()->route('addMember.index', ['id' => $pid])->with('success', 'Details Updated');
        }
        return redirect()->route('addMember.index', ['id' => $pid])->with('error', 'Failed!');
    }
    public function destroy($id,$pid)
    {
        $affected =  DB::delete('delete from works where mid = ? and pid = ?', [$id,$pid]);
        if ($affected) {
            return redirect()->route('addMember.index', ['id' => $pid])->with('success', 'Member Removed!');
        }
        return redirect()->route('addMember.index', ['id' => $pid])->with('error', 'Failed!');
    }
}
