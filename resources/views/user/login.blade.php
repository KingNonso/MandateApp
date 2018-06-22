@extends('user.app')

@section('title', 'Change Login Credentials')

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
                                <h4 class="title">Modify Your Login Credentials</h4>
                            </div>
                            <div class="content">
                            {!! Form::model( $user, ['method' => 'put', 'route' => ['update_password', $user->id] ]) !!}
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               
                                                {!! Form::label('email', 'Email address') !!}
                                            {!! Form::text('email', $user->email, ['class' => 'form-control border-input']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                            <label>Old Password</label>
                                            <input type="password" id="old_password" name="old_password" class="form-control border-input" placeholder="Enter your old password here">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" id="new_password" name="new_password" class="form-control border-input" placeholder="Enter your new password here">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control border-input" placeholder="Confirm your new password">

                                                 
                                            </div>
                                        </div>
                                    </div>

                                    

                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Update Login</button>
                                    </div>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>


                </div>


@endsection
