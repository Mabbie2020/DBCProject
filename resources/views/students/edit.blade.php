@extends('layout.master')

@section('title','Edit Student')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user" action="/students/{{$student->id}}/update" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>First Name</label>
                    <input type="text" class="form-control form-control-user @error('firstname') is-invalid @enderror" 
                    placeholder="Enter First Name.." name="firstname" required 
                    value="{{$student->firstname}}">
                    @error('firstname')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control form-control-user @error('lastname') is-invalid @enderror"
                    placeholder="Enter Last Name" name="lastname" required 
                    value="{{$student->lastname}}">
                    @error('lastname')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Student ID</label>
                    <input type="text" class="form-control form-control-user @error('student_id') is-invalid @enderror" 
                    placeholder="Enter Student ID" name="student_id" required 
                    value="{{$student->student_id}}">
                    @error('student_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label>Course Name</label>
                    <select class="form-control" name="course_name" >
                        <option value="csd" {{$student->course_name=='csd'?'selected':''}}>CSD</option>
                        <option value="dbc" {{$student->course_name=='dbc'?'selected':''}}>DBC</option>
                        <option value="icdl" {{$student->course_name=='icdl'?'selected':''}}>ICDL</option>
                        <option value="network" {{$student->course_name=='network'?'selected':''}}>NETWORK</option>
                    </select>
                   
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" 
                    placeholder="Enter Student's Email" name="email" required 
                    value="{{$student->email}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label>Contact</label>
                    <input type="text" class="form-control form-control-user @error('contact') is-invalid @enderror" 
                    placeholder="Enter Student's Contact" name="contact" required 
                    value="{{$student->contact}}">
                    @error('contact')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control form-control-user @error('address') is-invalid @enderror" 
                id="exampleInputEmail" aria-describedby="emailHelp" 
                placeholder="Enter Student's Address" name="address" required value="{{$student->address}}">
                @error('address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-info btn-user btn-block">
                Update
            </button>
            <hr>
        </form>
    </div>
</div>
@endsection