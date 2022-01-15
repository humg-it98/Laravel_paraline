@extends('layout.admin')
@section('admin_content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <section class="content" >
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="margin-bottom: 50px;">
                                <h2>Confirm create group</h2>
                                <div class="panel-body">
                                    <form action="{{ route('group.store') }}" method="post">
                                        @csrf
                                        <div class="form-horizontal">
                                            <div class="row" style="margin-top:15px;border: 1px solid#000; padding: 40px">
                                                <div class="col-md-2">Name</div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="" disabled value="{{$confirmGroup['group_name'] }}">
                                                    <input type="hidden" class="form-control" name="group_name" value="{{$confirmGroup['group_name'] }}">
                                                </div>
                                            </div>
                                            <br>
                                            <div style="display: flex; justify-content: space-between">
                                                <a href="{{ url()->previous() }}">Back</a>
                                                <button type="submit" class="btn btn-primary">Confirm</button>
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
