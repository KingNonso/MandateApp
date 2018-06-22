@extends('user.app')

@section('title', 'Profile')

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
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>12<br /><small>Souls Won</small></h5>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                            <li>
                                                <div class="row">
                                                    
                                                    <div class="col-xs-9">
                                                        <a href="{{url('home/login')}}" class="btn btn-link btn-lg">Change Login Credential</a>
                                                        
                                                    </div>

                                                    <div class="col-xs-3 text-right">
                                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-key"></i></btn>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                <div class="col-xs-9">
                                                        <a href="{{ url('home/location') }}" class="btn btn-link btn-lg">Change Location/ Church </a>
                                                        
                                                    </div>

                                                    <div class="col-xs-3 text-right">
                                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-gear"></i></btn>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                            {!! Form::model( $user, ['method' => 'put', 'route' => ['update_profile', $user->id] ]) !!}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('phone', 'Phone Number') !!}
                                            {!! Form::text('phone', null, ['class' => 'form-control border-input']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('slug', 'Username') !!}
                                            {!! Form::text('slug', null, ['class' => 'form-control border-input']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               
                                                {!! Form::label('email', 'Email address') !!}
                                            {!! Form::text('email', null, ['class' => 'form-control border-input', 'disabled']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('firstname', 'First Name') !!}
                                            {!! Form::text('firstname', null, ['class' => 'form-control border-input']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('surname', 'Last Name') !!}
                                            {!! Form::text('surname', null, ['class' => 'form-control border-input']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('othername', 'Other names') !!}
                                            {!! Form::text('othername', null, ['class' => 'form-control border-input']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                
                                                {!! Form::label('address', 'Address') !!}
                                            {!! Form::text('address', null, ['class' => 'form-control border-input']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Church</label>
                                                <input type="text" class="form-control border-input" placeholder="City" value="{{ $user->church }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control border-input" placeholder="City" value="{{ $user->city }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control border-input" placeholder="Country" value="{{ $user->state }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control border-input" placeholder="Country" value="{{ $user->country }}" disabled>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
You doubt I'll bother, reading into it
I'll probably won't, left to my own devices
But that's the difference in our opinions.</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>


                </div>


@endsection
