@extends('AdminArea.layouts.app')

@section('content')
<div class="content">
    <div class="row align-items-center p-0 m-0">
        <div class="col-md-6 p-0 m-0">
            <div class="breadcrumb-wrapper">
                <h1>Add Users</h1>
                {{--  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}">
                                <i class="mdi mdi-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            Membership Plan
                        </li>
                    </ol>
                </nav>  --}}
            </div>
        </div>
        <div class="col-md-6 text-right p-0 m-0">
            <div class="breadcrumb-wrapper">
                <a href="{{url('admin/user-account/add')}}" class="btn btn-primary">
                    <span class="fa fa-plus-circle"></span> Add Users
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="responsive-data-table">
                        <table id="responsive-data-table" class="table dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$user->first_name}} {{$user->last_name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td class="text-left">
                                        <div class="dropdown">
                                            <a class="btn btn-lg text-dark p-0" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical mdi-18px"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item"
                                                    href="{{url('admin/user-account/edit', $user->id)}}">
                                                    <i
                                                        class="mdi mdi-square-edit-outline text-info mdi-18px"></i>&nbsp;Edit
                                                </a>
                                                <div class="dropdown-divider responsive-moblile"></div>
                                                <a class="dropdown-item delete-data" data-id="{{$user->id}}"
                                                    href="javascript:void(0)">
                                                    <i class="mdi mdi-delete text-danger mdi-18px"></i>&nbsp;Delete
                                                </a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#responsive-data-table').DataTable({
            language: {
                paginate: {
                    next: '<i class="mdi mdi-chevron-right"></i>',
                    previous: '<i class="mdi mdi-chevron-left"></i>'
                }
            },
            "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
        });
    });
    $(".delete-data").on('click', function () {
        var id = $(this).attr('data-id');
        $.confirm({
            title: 'Are you sure?',
            content: 'This will delete this user permanently',
            buttons: {
                confirm: {
                    btnClass: 'btn-blue',
                    action: function () {
                        window.location.href = '{{ url("admin/user-account/delete") }}/' + id;
                    }
                },
                cancel: {
                    action: function () {}
                }
            }
        });

    });

</script>
@endsection
