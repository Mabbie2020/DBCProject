@extends('layout.master')

@section('title','Add students')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-info">Student List</h6> -->
        
        <h6 class="m-0 font-weight-bold text-info"><a class="m-0 font-weight-bold text-info" href="/students/create">Add Student</a></h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Student ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Course Name</th>
                                            <th>Address</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- using foreach loop to iterate through student list -->
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->action}}
                                            <a href="/students/{{$student->id}}/edit"
                                                ><i class="text-info">view</i></a>

                                            </td>
                                            <td>{{$student->student_id}}</td>
                                            <td>{{ucfirst($student->firstname)}}</td>
                                            <td>{{ucfirst($student->lastname)}}</td>
                                            <td>{{$student->contact}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{ucfirst($student->course_name)}}</td>
                                            <td>{{$student->address}}</td>
                                            <td>
                                                <!-- code to edit -->
                                                <a href="/students/{{$student->id}}/edit"
                                                class="btn btn-info btn-square btn-small "><i class="fas fa-edit"></i></a>

                                            <!-- code to delete  -->
                                                <a href="/students/{{$student->id}}/delete"
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
                <div class="modal-body">Select "Delete" if you want to remove student from the list.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/students/{{$student->id}}/delete" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">
                        Delete
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>



