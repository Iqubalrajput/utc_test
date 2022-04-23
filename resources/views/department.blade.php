@extends('layout')
@section('content')
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Department</div>
                    <div class="card-body">
                        <a href="{{ url('/get_csv') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Export data
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email </th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                            @php ($i = 1)
                                @foreach($department_data as $data)
                                <tr>  
                                    <td>{{$i}}</td>
                                    <td>{{$data->tourist_name}}</td>
                                    <td>{{$data->tourist_email}}</td>
                                    <td>
                                           @if($data->tourist_profilepicture != null)
                                            <img class="responsive-img circle z-depth-1" style="width:70px;height: 70px; border-radius: 50%;" src="{{$data->tourist_profilepicture }}" id="image" alt="ddd">
                                            @else
                                            <img class="responsive-img circle z-depth-1" style="width: 70px;height: 70px; border-radius: 50%;" src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                                            @endif
                                        </td>
                                    </tr>
                                    @php ($i++)
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