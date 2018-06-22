@extends('admin.app')

@section('title', 'Update  Announcement')

@section('content')

<div class="row">

                    
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header">
                                <h4 class="box-title">Update  Announcement</h4>
                            </div>
                            <div class="box-body">
                                {!! Form::model( $data, ['method' => 'put', 'route' => ['announcement.update', $data->id] ]) !!}

                                <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('subject', 'Subject') !!}
                                                    {!! Form::text('subject', $data->subject, ['class' => 'form-control border-input', 'placeholder' => 'What would you call your Announcement for short']) !!}
                                                    </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('body', 'Announcement in Full') !!} <br/>
                                                    {!! Form::textarea('body', $data->body, ['class' => 'form-control border-input', 'placeholder' => 'Full Description of what happened']) !!}
                                                    </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-fill">Submit Announcement</button>
                                    </div>
                                    <div class="clearfix"></div>

                                {!! Form::close() !!}
                                    
                                    
                            </div>
                        </div>
                    </div>


                </div>


@endsection
