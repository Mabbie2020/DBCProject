@extends('layout.master')

@section('title','Add Student')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user" action="{{route('student.create')}}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>First Name</label>
                    <input type="text" class="form-control  @error('firstname') is-invalid @enderror" 
                    placeholder="Enter First Name.." name="firstname" required 
                    value="{{old('firstname')}}">
                    @error('firstname')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control  @error('lastname') is-invalid @enderror"
                    placeholder="Enter Last Name" name="lastname" required 
                    value="{{old('lastname')}}">
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
                    <input type="text" class="form-control  @error('student_id') is-invalid @enderror" 
                    placeholder="Enter Student ID" name="student_id" required 
                    value="{{old('student_id')}}">
                    @error('student_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label>Course Name</label>
                    <select class="form-control" name="course_name" >
                        <option value="csd" {{old('course_name')=='csd'?'selected':''}}>CSD</option>
                        <option value="dbc" {{old('course_name')=='csd'?'selected':''}}>DBC</option>
                        <option value="icdl" {{old('course_name')=='csd'?'selected':''}}>ICDL</option>
                        <option value="network" {{old('course_name')=='csd'?'selected':''}}>NETWORK</option>
                    </select>
                   
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Email</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" 
                    placeholder="Enter Student's Email" name="email" required 
                    value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label>Contact</label>
                    <input type="text" class="form-control  @error('contact') is-invalid @enderror" 
                    placeholder="Enter Student's Contact" name="contact" required 
                    value="{{old('contact')}}">
                    @error('contact')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control  @error('address') is-invalid @enderror" 
                id="exampleInputEmail" aria-describedby="emailHelp" 
                placeholder="Enter Student's Address" name="address" required value="{{old('address')}}">
                @error('address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-info btn-user btn-block">
                Save
            </button>
            <hr>
        </form>
    </div>
</div>
@endsection