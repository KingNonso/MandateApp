@extends('user.app')

@section('title', 'Update Team ')

@section('content')

<div class="row">
                    <div class="col-md-12">
					<div class="card">
                            <div class="header">
                                <h4 class="title">Update Team</h4>
                            </div>
                            <div class="content">
                                {!! Form::model( $team, ['method' => 'put', 'route' => ['team.update', $team->id] ]) !!}
                                

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            {!! Form::label('name', 'Team Name') !!}
                                            {!! Form::text('name', null, ['class' => 'form-control border-input', 'placeholder' => 'What would you like to call your team']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            {!! Form::label('description', 'Team Description') !!}
                                            {!! Form::textarea('description', null, ['class' => 'form-control border-input', 'placeholder' => 'Here can be your description']) !!}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                    {!! Form::submit('Update Team', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
                                    </div>
                                    <div class="clearfix"></div>
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                       
                    </div>


                    


                </div>



@endsection
