@extends('layout.admin')
@section('admin_content')

    <div class="container">
        <div style="border: 1px solid#000; padding: 40px">
            <form action="{{route('group.search')}}" method="GET">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input name="name" type="text" value="" class="form-control" id="" placeholder="Name group">
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
                        <th style="" scope="col">STT</th>
                        <th scope="col">Tên group</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($query as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{ route('group.edit',['id'=>$item->group_id ]) }}" class="btn btn-secondary">Sửa</a>
                                <a href="{{ route('group.destroy',['id'=>$item->group_id ]) }}" onClick="return confirm('Bạn có chắc chắn muốn xóa Mục này?')" class="btn btn-danger">Xóa</a>
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
