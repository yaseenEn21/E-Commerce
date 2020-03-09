@extends('layouts.componants.main')
@section('title')
@if(Auth::user())
   {{ auth()->user()->name}} - profile

@endif
@endsection

@section('contant')


<div style="padding-top:60px"class="col-lg-8 push-lg-4">
    @if (session()->has('sucsses_message'))
    <div class="alert alert-success"> {{session()->get('sucsses_message')}} </div>
@endif   
@if (session()->has('first-time'))
<div class="alert alert-success" style=" text-transform: capitalize"> {{session()->get('first-time')['x']}}</div>
@endif   
{{session()->forget('first-time')}} 

    <ul class="nav nav-tabs">

        <li class="nav-item">
            <a href="" data-target="#edit" data-toggle="tab" class="nav-link active">Edit</a>
        </li>
        <li class="nav-item">
        <a href="{{route('order.index')}}" class="nav-link">Orders</a>
        </li>
    </ul>
    <div  style="padding-top:20px" class="tab-content p-b-3">
        <div class="tab-pane" id="profile">
        <h4 class="m-y-2">Orders</h4>
        
            <!--/row-->
        </div>
        
        <div class="tab-pane active" id="edit">
            <h4 class="m-y-2">Edit Profile</h4>
           <!--
            @if ($errors->any())
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label"></label>
                <div class="col-lg-9 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                             <li style="">{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            </div>
             @endif
        -->
           
    
        <form role="form" action="{{route('profile.update')}}" method="POST">
            @csrf
            {{ method_field('patch') }}       
         
                     <div class="form-group row">
                         
                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name='name' value="{{auth()->user()->name}}">
                        @error('name')
                        <div style="padding-top:7px; color:red">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="email" name='email' value="{{auth()->user()->email}}">
                        @error('email')
                        <div style="padding-top:7px; color:red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    
                    <div class="col-lg-9">                   
                    <input class="form-control" type="password"  name="password">
                    @error('password')
                    <div style="padding-top:7px; color:red">{{ $message }}</div>
                @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                    </div>
                </div>
            </form>
         
        </div>
    </div>
</div>
<hr>

</div>
    @endsection
    @section('news-footer')
        @includeIf('layouts.componants.footer.news-footer')
    @endsection
