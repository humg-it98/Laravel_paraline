<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteModelTrait;


class EmployeesController extends Controller
{

    /**
     * @var Employee
     */
    private $employee;
    /**
     * @var EmployeeImage
     */
    use StorageImageTrait;

    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('home');
        }else{
            Toastr::error('Ban chua login, ai cho vao');
            return Redirect::to('login')->send();
        }
    }

    public function __construct(Employee $employee)
    {
        $this->employee =$employee;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthLogin();
        $listEmployee = Employee::with('team')->orderBy('id','DESC')->paginate(5);
        return view('employee.index',compact('listEmployee'));
    }

    public function search(Request $request){
        $this->AuthLogin();
        $search = $request -> name;
        $query = Employee::where('name', 'LIKE', "%$search%")->paginate(10);
        return view('group.search',compact('query'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $this->AuthLogin();
        $team = Team::all();
        return view('employee.create',compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $request)
    {
        $dataEmployeeCreate = [
            'email' => $request->email,
            'team_id' => $request->team_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birth_day' => $request->birth_day,
            'address' => $request->address,
            'salary' => filter_var($request->salary, FILTER_SANITIZE_NUMBER_INT),
            'position_id' => $request->position_id,
            'type_work' => $request->type_work,
            'status' => $request->status,
            'ins_id' => Auth::id(),
        ];

        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'avatar', 'employee');
        if (!empty($dataUploadFeatureImage)) {
            $dataEmployeeCreate['avatar'] = $dataUploadFeatureImage['file_name'];
            $dataEmployeeCreate['image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $employee = $this->employee->create($dataEmployeeCreate);
        Toastr::success('Bạn vừa thêm người dùng thành công', 'Thông báo');
        return redirect()->route('employee.index');
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
