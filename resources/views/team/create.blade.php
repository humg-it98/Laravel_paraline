@extends('layout.admin')
@section('admin_content')
      <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid" style="margin:auto;width: 75%;">
                <section class="content">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="margin-bottom: 50px;">
                                <h2>Create Team</h2>
                                <div class="panel-body" style="border: 1px solid#000; padding: 40px">
                                    <form action="{{route('team.confirm')}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input name="team_name" type="text" value="{{old('team_name')}}" class="form-control" id="" placeholder="Nhập tên team">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Group</label>
                                            <div class="col-sm-10">
                                                <select name="group_id" class="form-control" id="sel1">
                                                    @foreach($group as $item )
                                                    <option value="{{$item->group_id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: space-between">
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </form>
                                </div>
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
