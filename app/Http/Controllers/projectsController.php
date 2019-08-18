<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;
use Carbon\Carbon;

// DB::select('select * from users where id = :id', ['id' => 1]);
//  $users = DB::select('select * from users where active = ?', [1]);
// DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
// $affected = DB::update('update users set votes = 100 where name = ?', ['John']);
class projectsController extends Controller
{

    public function index()
    {
        // $projects = Project::all();
        //return Post::where('title', 'Post Two')->get();
        $projects = DB::select('SELECT * FROM projects order by created_at desc');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();
        //  $projects = Project::orderBy('created_at','desc')->paginate(10);
        return view('project.index')->with('projects', $projects);
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
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
        
        $created_at= Carbon::now()->toDateTimeString();

        DB::insert('insert into projects (title, field, description, status, datestarted, duration, type, priority, created_at)
         values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$request->input('title'), $request->input('field'), $request->input('description')
         ,$request->input('status'),$request->input('datestarted'),$request->input('duration'),$request->input('type'),$request->input('priority'), $created_at]);

        return redirect('/project')->with('success', 'Project Created');
    }

    public function show($id)
    {
        $projects = DB::select('SELECT * FROM projects where id= ?',[$id]);
        return view('project.show')->with('projects', $projects);
    }

    public function edit($id)
    {
        $projects = DB::select('SELECT * FROM projects where id= ?',[$id]);
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
         where id = ?', [$request->input('title'), $request->input('field'), $request->input('description')
         ,$request->input('status'),$request->input('datestarted'),$request->input('duration'),$request->input('type'),$request->input('priority'), $updated_at, $id]);
        
        if ($affected) {
            return redirect()->route('project.show', ['id' => $id])->with('success', 'Details Updated');
        }
        return redirect()->route('project.show', ['id' => $id])->with('error', 'Failed!');
    }


    public function destroy($id)
    {
        $affected = DB::delete('delete from projects where id = ?', [$id]);
        if ($affected) {
            return redirect()->route('project.index')->with('success', 'Project Details Deleted');
        }
        return redirect()->route('project.show', ['id' => $id])->with('error', 'Failed!');
    }
}
