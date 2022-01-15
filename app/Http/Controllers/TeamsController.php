<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TeamsController extends Controller
{
    /**
     * @var Team
     */
    private $team;

    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('home');
        }else{
            Toastr::error('Ban chua login, ai cho vao');
            return Redirect::to('login')->send();
        }
    }

    public function __construct(Team $team)
    {
        $this->team =$team;
    }

    public function search(Request $request){
        $this->AuthLogin();
        $group = Group::all();
        $name = $request -> name;
        $group_id = $request -> group_id;
        $query = Team::where('name', 'LIKE', "%$name%")->where('group_id', $group_id)->where('del_flag',0)->paginate(10);
        return view('team.search',compact('query','group'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthLogin();
        $group = Group::all();
        $listTeam = Team::with('group')->orderBy('team_id','DESC')->paginate(5);
        return view('team.index',compact('listTeam','group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $group = Group::all();
        return view('team.create',compact('group'));
    }
    public function confirm(Request $request){
        {
            $this->AuthLogin();
            $confirmTeam['team_name'] = $request->team_name;
            $confirmTeam['group_id'] = $request->group_id;
            return view('team.confirm',compact('confirmTeam'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $team = new Team;
        $team->name = $data['team_name'];
        $team->group_id = $data['group'];
        $team->save();
        Toastr::success('Team đã được thêm thành công', 'Thông báo');
        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
