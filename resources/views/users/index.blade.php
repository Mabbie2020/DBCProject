@extends('layout.master')

@section('$title',' user list')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Staff List</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>FullName</th>
                                            <th>Title</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- using foreach loop to iterate through users list -->
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->action}}<a href="/users/{{$user->id}}/edit"><i class="text-info">view</i></a></td>
                                            <td>{{ucfirst($user->name)}}</td>
                                            <td>{{ucfirst($user->title)}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->contact}}</td>
                                            <td>{{$user->action}}
                                                <!-- code to edit -->
                                                <a href="/users/{{$user->id}}/edit"
                                                class="btn btn-info btn-square btn-small "><i class="fas fa-edit"></i></a>

                                            <!-- code to delete  -->
                                                <a href="/users/{{$user->id}}/delete"
                                                class="btn btn-info btn-square btn-small " data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>                   
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                       </div>
            </div>
@endsection
<!-- delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" if you want to remove user from the list.</div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/users/{{$user->id}}/delete" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">
                        Delete
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>