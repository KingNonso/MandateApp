@extends('user.app')

@section('title', $profile->fullName)

@section('content')

<div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="{{ asset('img/gla.jpg') }}" alt="..." />
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="{{ asset('img/faces/face-2.jpg') }}" alt="..."/>
                                  <h4 class="title"> {{ $profile->fullName }} <br />
                                     <a href="#"><small>@ {{$profile->slug}} </small></a>
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
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Profile</h4>
                            </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('phone', 'Phone Number') !!}
                                                <p class="form-control border-input">{{ $profile->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('slug', 'Username') !!}
                                                <p class="form-control border-input">{{ $profile->slug }}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               
                                                {!! Form::label('email', 'Email address') !!}
                                                <p class="form-control border-input">{{ $profile->email }}</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('firstname', 'First Name') !!}
                                                <p class="form-control border-input">{{ $profile->firstname }}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('surname', 'Last Name') !!}
                                                <p class="form-control border-input">{{ $profile->surname }}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                                {!! Form::label('othername', 'Other names') !!}
                                                <p class="form-control border-input">{{ $profile->othername }}</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                
                                                {!! Form::label('address', 'Address') !!}
                                                <p class="form-control border-input">{{ $profile->address }}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Church</label>
                                                <p class="form-control border-input">{{ $profile->church }}</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <p class="form-control border-input">{{ $profile->city }}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <p class="form-control border-input">{{ $profile->state }}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <p class="form-control border-input">{{ $profile->country }}</p>

                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="2" class="form-control border-input" placeholder="Here can be your description" value="Mike">
                                                    A child of God
                                                    A Son of the most high
                                                    
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                </div>


@endsection
