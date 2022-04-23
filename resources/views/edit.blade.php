@extends('layout')
@section('content')
 
<div class="card" style="margin: top 20px;">
  <div class="card-header">DepartMent Page</div>
  <div class="card-body">
      
      <form class="row" action="{{ url('update') . '/' . $department->id}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        
        <div class="col-lg-6">
          <label>Name</label></br>
          <input type="text" name="name" id="name" value="{{$department->name}}" class="form-control">
          <span class="text-danger">{{ $errors->first('name') }}</span></br>
       </div>
       <div class="col-lg-6">
          <label>Employee</label></br>
          <select class="form-select"  name="employe_id" id="employe_id">
              @foreach($employe as $data)
                <option value="{{$data->id}}" @if($department->employe_id == $data->id) selected @endif>{{$data->name}}</option>
                @endforeach
          </select>
          <span class="text-danger">{{ $errors->first('employe') }}</span>
        </div>
        <div class="col-lg-6">
          <label>Email</label></br>
          <input type="email" name="email" id="email" class="form-control" value="{{$department->email}}">
          <span class="text-danger">{{ $errors->first('email') }}</span></br>
        </div>
        <div class="col-lg-6">
          <label>Designation</label></br>
          <select class="form-select"  name="designation" id="designation">
                <option value="CEO"  @if($department->designation == "CEO") selected @endif>CEO</option>
                <option value="CTO" @if($department->designation == "CTO") selected @endif>CTO</option>
                <option value="CFO" @if($department->designation == "CFO") selected @endif>CFO</option>
                <option value="CMO" @if($department->designation == "CMO") selected @endif>CMO</option>
          </select>
          <span class="text-danger">{{ $errors->first('designation') }}</span>
       </div>
        <div class="col-lg-6">
          <label>Country</label></br>
          <input type="text" name="country" id="country" class="form-control"  value="{{$department->country}}">
          <span class="text-danger">{{ $errors->first('country') }}</span></br>
        </div>
        <div class="col-lg-6">
          <label>State</label></br>
          <input type="text" name="state" id="state" class="form-control" value="{{$department->state}}">
          <span class="text-danger">{{ $errors->first('state') }}</span></br>
        </div>
        <div class="col-lg-6">
          <label>City</label></br>
          <input type="text" name="city" id="city" class="form-control" value="{{$department->city}}">
          <span class="text-danger">{{ $errors->first('city') }}</span></br>
        </div>
        <div class="col-lg-6">
          <label>Mobile</label></br>
          <input type="number" name="mobile" id="mobile" class="form-control" value="{{$department->mobile}}">
          <span class="text-danger">{{ $errors->first('mobile') }}</span></br>
        </div>
        <div class="col-lg-6">
          <label>Gender</label></br>
          <input type="radio" value="Male" id="male" name="gender" @if($department->gender == "Male") checked @endif>
          <label for="male">Male</label>
          <input type="radio" value="Female" id="female" name="gender"  @if($department->gender == "Female") checked @endif>
          <label for="female">Female</label> 
          <span class="text-danger">{{ $errors->first('gender') }}</span></br>
        </div>
        <div class="col-lg-6">
          <label>Hobbies</label></br>
        <input type="checkbox" value="cricket" id="cricket" name="hobbies[]" checked>
        <label for="cricket">cricket</label>
        <input type="checkbox" value="football" id="football" name="hobbies[]">
        <label for="football">Football</label>
        <input type="checkbox" value="singing" id="singing" name="hobbies[]">
        <label for="singing">Singing</label> 
          <span class="text-danger">{{ $errors->first('hobbies') }}</span> 
        </div>
        <div class="col-lg-6">
          <label>Image</label></br>
          <input type="file" name="file" id="file" class="form-control">
          @if($department->image != null)
            <img class="responsive-img circle z-depth-1" style="width:70px;height: 70px; border-radius: 50%;" src="{{ asset('storage/images/' . $department->image) }}" id="image" alt="ddd">
          
            @endif
          <span class="text-danger">{{ $errors->first('file') }}</span> </br>
        </div>
        <div class="col-lg-6">
          <label></label></br>
            <input type="submit" value="Save" class="btn btn-success" style="width:100%;"></br>
        </div>
    </form>
   
  </div>
</div>
 
@stop