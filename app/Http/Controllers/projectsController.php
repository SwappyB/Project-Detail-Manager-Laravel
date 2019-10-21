<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;
use Carbon\Carbon;
use App\Customer;
use App\Member;
// DB::select('select * from users where id = :id', ['id' => 1]);
//  $users = DB::select('select * from users where active = ?', [1]);
// DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
// $affected = DB::update('update users set votes = 100 where name = ?', ['John']);
class projectsController extends Controller
{
/**
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
        // $projects = Project::allfff();
        //return Post::where('title', 'Post Two')->get();
        $projects = DB::select('SELECT * FROM projects order by created_at desc');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();
        //  $projects = Project::orderBy('created_at','desc')->paginate(10);
        return view('project.index')->with('projects', $projects);
    }

    public function create()
    {
        $data['members'] = DB::select('SELECT * FROM members order by created_at desc');
        $data['customers'] = DB::select('SELECT * FROM customers order by created_at desc');
        return view('project.create')->with('data',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:projects',
            'field' => 'required',
            'description' => 'required',
            'status' => 'required',
            'datestarted' => 'required',
            'type' => 'required',
            'duration' => 'required',
            'priority' => 'required',
        ]);
        
        $created_at= Carbon::now()->toDateTimeString();

        DB::insert('insert into projects (cid,title, field, description, status, datestarted, duration, type, priority, created_at)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$request->input('customer'),$request->input('title'), $request->input('field'), $request->input('description')
        ,$request->input('status'),$request->input('datestarted'),$request->input('duration'),$request->input('type'),$request->input('priority'), $created_at]);
        
        // foreach($request->input('members') as $unit)
        
        // for($i = 1;$i<=count($request->input('members'));$i++)
        // {
        //     DB::insert('insert into works values (?, ?)', [, ])
        // }
        // return count($request->input('members'));
        return redirect('/project')->with('success', 'Project Created');
    }

    public function show($id)
    {
        // $data['projects'] = DB::select('SELECT * FROM projects where pid= ?',[$id]);
        // $data['customer'] = DB::select('select name from customers where cid = ?', [$data['projects'][0]->cid]);
        $data['main']= DB::select('select c.name,p.pid,p.cid,p.title,p.field,p.description,p.status,p.datestarted,p.duration,p.type,p.priority,p.created_at,p.updated_at from projects p,customers c where p.pid = ? and
         c.cid=p.cid',[$id]);
        $data['members']= DB::select('select m.mid,m.name,m.branch,m.year,m.phoneNumber,m.email,m.created_at,m.updated_at from members m,projects p, works w where m.mid=w.mid and p.pid=w.pid and p.pid=?',[$id]);
        // return $data;
        return view('project.show')->with('data',$data);
    }

    public function edit($id)
    {
        $projects = DB::select('SELECT * FROM projects where pid= ?',[$id]);
        return view('project.edit')->with('projects', $projects);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'field' => 'required',
            'description' => 'required',
            'status' => 'required',
            'datestarted' => 'required',
            'type' => 'required',
            'duration' => 'required',
            'priority' => 'required',
        ]);

        $updated_at= Carbon::now()->toDateTimeString();

        $affected = DB::update('update projects set title = ? , field=? , description=?, status=?, datestarted=?, duration=?, type=?, priority=?, updated_at=?
         where pid = ?', [$request->input('title'), $request->input('field'), $request->input('description')
         ,$request->input('status'),$request->input('datestarted'),$request->input('duration'),$request->input('type'),$request->input('priority'), $updated_at, $id]);
        
        if ($affected) {
            return redirect()->route('project.show', ['id' => $id])->with('success', 'Details Updated');
        }
        return redirect()->route('project.show', ['id' => $id])->with('error', 'Failed!');
    }


    public function destroy($id)
    {
        $affectedd = DB::delete('delete from works where pid = ?', [$id]);
        $affected = DB::delete('delete from projects where pid = ?', [$id]);
        if ($affected) {
            return redirect()->route('project.index')->with('success', 'Project Details Deleted');
        }
        return redirect()->route('project.show', ['id' => $id])->with('error', 'Failed!');
    }
}
