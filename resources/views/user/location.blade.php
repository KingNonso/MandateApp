@extends('user.app')

@section('title', 'Church and Location Settings')

@section('content')

<div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="{{ asset('img/background.jpg') }}" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="{{ asset('img/faces/face-2.jpg') }}" alt="..."/>
                                  <h4 class="title"> {{ Auth::user()->fullName }} <br />
                                     <a href="#"><small>@ {{Auth::user()->slug}} </small></a>
                                  </h4>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Modify Your Church and Location Settings</h4>
                            </div>
                            <div class="content">
                            {!! Form::model( $user, ['method' => 'put', 'route' => ['update_location', $user->id] ]) !!}

                            <div class="row">
                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Church</label>
                                                <input type="text" class="form-control border-input" placeholder="City" value="{{ $user->church }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control border-input" placeholder="City" value="{{ $user->city }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control border-input" placeholder="Country" value="{{ $user->state }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control border-input" placeholder="Country" value="{{ $user->country }}" disabled>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               
                                                {!! Form::label('country', 'Select Country') !!}
                                                {!! Form::select('country', ['' => 'Select']+$countries,'',array('class'=>'form-control border-input','id'=>'country'));!!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            {!! Form::label('state', 'Select State') !!}
                                            <select name="state" id="state" class="form-control border-input {{ $errors->has('state') ? ' is-invalid' : '' }}" value="{{ old('state') }}" required autofocus> </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            {!! Form::label('city', 'Select City') !!}
                                            <select name="city" id="city" class="form-control border-input {{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}" required autofocus> </select>

                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            {!! Form::label('church', 'Select Church') !!}
                                            <input id="church" type="text" class="form-control border-input {{ $errors->has('church') ? ' is-invalid' : '' }}" name="church" value="{{ old('church') }}"  autofocus>
                                                
                                            </div>
                                        </div>
                                        
                                        </div>

                                    

                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Update Locale</button>
                                    </div>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>


                </div>

<script src="http://demo.expertphp.in/js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#country').change(function(){

    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
});
       
    </script>

@endsection
