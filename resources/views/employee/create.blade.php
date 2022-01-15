@extends('layout.admin')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid" style="margin:auto;width: 75%;">
                <section class="content">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="margin-bottom: 50px;">
                                <h2>Create Employee</h2>
                                <div class="panel-body">
                                    <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-horizontal" style="border: 1px solid black; padding: 20px;">
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Avatar</div>
                                                <div class="col-md-10">
                                                    <img height="100" width="100" id="blah" src="https://ntn.com/assets/images/img-defau.jpg" alt="your image" />
                                                    <br>
                                                    <input type="file" name="avatar" onchange="readURL(this);" />
                                                    <br>
                                                    <span class="text-danger">
                                                </span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Team</label>
                                                <div class="col-sm-10">
                                                    <select name="team_id" class="form-control" id="sel1">
                                                        @foreach($team as $item )
                                                            <option value="{{$item->team_id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Email</div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="email" value="">
                                                    <br>
                                                    @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Firs name</div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="first_name" value="">
                                                    <br>
                                                    @error('first_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Last name</div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="last_name" value="">
                                                    <br>
                                                    @error('last_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Gender</div>
                                                <div class="col-md-10">
                                                    <input type="radio" name="gender" checked value="0"> Male
                                                    <input type="radio" name="gender" value="1" style="margin-left:20px;">  Female
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Birth day</div>
                                                <div class="col-md-10">
                                                    <input type="date" class="form-control" name="birth_day" value="">
                                                    <br>
                                                    @error('birth_day')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Address</div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="address" value="">
                                                    <br>
                                                    @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Salary</div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="salary" value="">
                                                    <br>
                                                    @error('salary')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Position</label>
                                                <div class="col-sm-10">
                                                    <select name="position_id" class="form-control" id="sel1">
                                                        @foreach($team as $item )
                                                            <option value="{{$item->team_id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Type of work</label>
                                                <div class="col-sm-10">
                                                    <select name="type_work" class="form-control" id="sel1">
                                                        <option value="0">Full-time</option>
                                                        <option value="1">Part-time</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px;">
                                                <div class="col-md-2">Status</div>
                                                <div class="col-md-10">
                                                    <input type="radio" name="status" checked value="0"> On working
                                                    <input type="radio" name="status" value="1" style="margin-left:20px;">  Retired
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div style="display: flex; justify-content: space-between">
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </main>
    </div>

    </body>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
