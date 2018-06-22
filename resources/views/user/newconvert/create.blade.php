@extends('user.app')

@section('title', 'Add New Convert')

@section('content')

<div class="row">

                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Create Profile</h4>
                            </div>
                            <div class="content">
                                {!! Form::open(['route' => 'newconvert.store']) !!}
                                <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('firstname', 'Firstname') !!}
                                                    {!! Form::text('firstname', '', ['class' => 'form-control border-input', 'placeholder' => 'New convert\'s First name']) !!}
                                                    </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('surname', 'Surname') !!}
                                                    {!! Form::text('surname', '', ['class' => 'form-control border-input', 'placeholder' => 'New convert\'s Surname']) !!}
                                                    </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('sex', 'Sex') !!} <br/>
                                                    {!! Form::select('sex', ['male' => 'male','female' => 'female'], null, ['placeholder' => 'Select Sex...','class' => 'form-control border-input']) !!}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('phone', 'Phone Number') !!}
                                                    {!! Form::text('phone', '', ['class' => 'form-control border-input', 'placeholder' => 'New convert\'s phone number']) !!}
                                                    </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('email', 'Email') !!}
                                                    {!! Form::text('email', '', ['class' => 'form-control border-input', 'placeholder' => 'New convert\'s email']) !!}
                                                    </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('age', 'Age Range') !!} <br/>
                                                    {!! Form::select('age', ['0 - 12' => '0 - 12', '13 - 17' => '13 - 17', '18 - 30' => '18 - 30', '31 - 50' => '31 - 50','51 +' => '51 +'], null, ['placeholder' => 'Select age range...','class' => 'form-control border-input']) !!}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    {!! Form::label('address', 'Address') !!}
                                                    {!! Form::text('address', '', ['class' => 'form-control border-input', 'placeholder' => 'New convert\'s address ']) !!}
                                                    </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('occupation', 'Occupation') !!} <br/>
                                                    {!! Form::select('occupation', ['Student' => 'Student', 'Graduate' => 'Graduate', 'Unemployed'=> 'Unemployed', 'Unskilled Worker' => 'Unskilled Worker','Business man/woman' => 'Business man/woman','Practicing Professional' => 'Practicing Professional','Civil Servant' => 'Civil Servant', 'Retired' => 'Retired'], null, ['placeholder' => 'Select occupation ...','class' => 'form-control border-input']) !!}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('request', 'Need/ Prayer Request') !!}
                                                    {!! Form::textarea('request', '', ['class' => 'form-control border-input', 'placeholder' => 'New convert\'s need or prayer request or desire ','rows' => 2]) !!}
                                                    </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-fill btn-wd">Create New Convert Profile</button>
                                    </div>
                                    <div class="clearfix"></div>

                                {!! Form::close() !!}
                                    
                                    
                                </form>
                            </div>
                        </div>
                    </div>


                </div>


@endsection
