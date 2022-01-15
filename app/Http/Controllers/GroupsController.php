<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Group\GroupRepository;

class GroupsController extends Controller
{

    /**
     * @var Group
     */
    protected $groupRepository;

    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('home');
        }else{
            Toastr::error('Ban chua login, ai cho vao');
            return Redirect::to('login')->send();
        }
    }

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthLogin();
        $listGroup = $this->groupRepository->getAllList();
//        $listGroup = $this->group->latest()->paginate(5);
        return view('group.index',compact('listGroup'));
    }

    public function search(Request $request){
        $this->AuthLogin();
        $search = $request -> name;
        $query = Group::where('name', 'LIKE', "%$search%")->paginate(10);
        return view('group.search',compact('query'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('group.create');
    }

    public function confirm(Request $request){
        {
            $this->AuthLogin();
            $confirmGroup['group_name'] = $request->name;
            return view('group.confirm',compact('confirmGroup'));
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
        $group = new Group;
        $group->name = $request->group_name;
        $group->ins_id = auth()->id();
        $group->save();
        Toastr::success('Group đã được thêm thành công', 'Thông báo');
        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $this->AuthLogin();
        $confirmGroup = [
            'id' => $request->id,
            'name' => $request->name,
        ];
        return view('group.confirm',compact($confirmGroup));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->AuthLogin();
        $group = $this->groupRepository->getListById($id);
        return view('group.edit',compact('group'));
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
        $user = Auth::user();
        $this->group->findOrFail($id)->update([
            'name' => $request->name,
            'upd_id' => auth()->id(),
        ]);
        Toastr::success('Bạn vừa sửa group thành công', 'Thông báo');
        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AuthLogin();
        $this->groupRepository->destroy($id);
//        $this->group->find($id)->delete();
        Toastr::info('Bạn vừa xóa danh mục thành công', 'Thông báo');
        return redirect()->route('group.index');
    }
}
