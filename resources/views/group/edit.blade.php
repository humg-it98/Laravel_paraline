@extends('layout.admin')
@section('admin_content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <section class="content" style="border: 1px solid#000; padding: 40px">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="margin-bottom: 50px;">
                            <h2>Edit Group</h2>
                            <div class="panel-body">
                                <form action="{{ route('group.update',['id'=>$group->group_id]) }}" method="post">
                                    @csrf
                                <div class="form-horizontal">
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col-md-2">ID</div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="id" disabled value="{{$group->group_id}}">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col-md-2">Name</div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="name" value="{{$group->name}}">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-10">
                                            <button id="submit" class="btn btn-primary" type="submit" value="submit">Submit</button>
                                        </div>
                                    </div>
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
