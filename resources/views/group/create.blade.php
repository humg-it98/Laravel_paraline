@extends('layout.admin')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid" style="margin:auto;width: 75%;">
                <section class="content">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="margin-bottom: 50px;">
                                <h2>Create Group</h2>
                                <div class="panel-body" style="border: 1px solid#000; padding: 40px">
                                    <form action="{{route('group.confirm')}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input name="name" type="text" value="{{old('name')}}" class="form-control" id="" placeholder="Nhập tên group">
                                                @error('name')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
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
@endsection
