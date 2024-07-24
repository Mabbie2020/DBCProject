@extends('layout.master')

@section('title','Add Staff')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user" action="{{route('user.create')}}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label>Name</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" 
                    placeholder="Enter Name.." name="name" required 
                    value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label>Title</label>
                    <select class="form-control" name="title" >
                        <option value="junior" {{old('title')=='junior'?'selected':''}}>JUNIOR</option>
                        <option value="middle" {{old('title')=='middle'?'selected':''}}>MIDDLE</option>
                        <option value="senior" {{old('title')=='senior'?'selected':''}}>SENIOR</option>
                    </select>
                   
                </div>
            
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label>Email</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" 
                    placeholder="Enter Email" name="email" required 
                    value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label>Contact</label>
                    <input type="text" class="form-control  @error('contact') is-invalid @enderror" 
                    placeholder="Enter Contact" name="contact" required 
                    value="{{old('contact')}}">
                    @error('contact')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Password</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror"  
                placeholder="Enter Password" name="password" required value="{{old('password')}}">
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group"> 
                <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Confirm Password</label>
                <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"  
                placeholder="Enter Password" name="password_confirmation" required value="{{old('password_confirmation')}}">
                @error('confirm password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            </div>
            <button type="submit" class="btn btn-info btn-user btn-block">
                Save
            </button>
            <hr>
        </form>
    </div>
</div>
@endsection