@extends('layout.admin')
@section('admin_content')

    <div class="container">
        <div style="border: 1px solid#000; padding: 40px">
            <form action="{{route('team.search')}}" method="GET">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input name="name" type="text" value="" class="form-control" id="" placeholder="Name">
                    </div>
                    <label for="inputPassword" class="col-sm-2 col-form-label">Thuoc Group</label>
                    <div class="col-sm-10">
                        <select name="group_id" class="form-control" id="">
                            @foreach($group as $key => $group)
                                <option value="{{$group->group_id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-between">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>


        <br>
        <div class="grid_8">
            <div class="box round first grid">
                <table class="table table-bordered" id="">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên team</th>
                        <th scope="col">Thuộc Group</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($query as $item)
                        <tr>
                            <th style="vertical-align: middle" scope="row">{{$loop->iteration}}</th>
                            <td style="vertical-align: middle">{{$item->name}}</td>
                            <td style="vertical-align: middle">{{$item->group->name}}</td>
                            <td style="vertical-align: center">
                                <a href="{{ route('team.edit',['id'=>$item->team_id ]) }}" class="btn btn-secondary">Sửa</a>
                                <a href="{{ route('team.destroy',['id'=>$item->team_id ]) }}" onClick="return confirm('Bạn có chắc chắn muốn xóa Mục này?')" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                {{ $query->links('pagination::bootstrap-4') }}
            </ul>
        </nav>


    </div>
@endsection
