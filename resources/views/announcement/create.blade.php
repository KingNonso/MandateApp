@extends('user.app')

@section('title', 'Create New Announcement')

@section('content')

<div class="row">

                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Enter New Announcement</h4>
                            </div>
                            <div class="content">
                                {!! Form::open(['route' => 'announcement.store']) !!}
                                <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('subject', 'Subject') !!}
                                                    {!! Form::text('subject', '', ['class' => 'form-control border-input', 'placeholder' => 'What would you call your Announcement for short']) !!}
                                                    </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('body', 'Announcement in Full') !!} <br/>
                                                    {!! Form::textarea('body', '', ['class' => 'form-control border-input', 'placeholder' => 'Full Description of what happened']) !!}
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
