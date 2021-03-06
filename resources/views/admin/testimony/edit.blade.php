@extends('admin.app')

@section('title', 'Update  Testimony')

@section('content')

<div class="row">

                    
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Update  Testimony</h3>
                            </div>
                            <div class="box-body">
                                {!! Form::model( $data, ['method' => 'put', 'route' => ['testimony.update', $data->id] ]) !!}

                                <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('subject', 'Subject') !!}
                                                    {!! Form::text('subject', $data->subject, ['class' => 'form-control border-input', 'placeholder' => 'What would you call your testimony for short']) !!}
                                                    </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('category', 'Category') !!} <br/>
                                                {!! Form::select('category', $category, $data->category_id, ['placeholder' => 'Select one...','class' => 'form-control border-input']) !!}
                                            </div>
                                    </div>
                                        
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('happen_to', 'Happenned To Who?') !!} <br/>
                                                    {!! Form::select('happen_to', ['me' => 'me', 'My Father' => 'My Father', 'My Mother' => 'My Mother', 'My Child' => 'My Child', 'My Sibling' => 'My Sibling', 'My Uncle' => 'My Uncle', 'My Aunt' => 'My Aunt', 'My Friend' => 'My Friend', 'A Colleague/ School Mate' => 'A Colleague/ School Mate' ], $data->happen_to, ['placeholder' => 'Select one ...','class' => 'form-control border-input']) !!}
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('contact', 'Active contact detail') !!}
                                                {!! Form::text('contact', $data->contact, ['class' => 'form-control border-input', 'placeholder' => 'Enter phone number of the person it happened to ']) !!}
                                                </div>
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('testimony', 'Testimony in Full') !!} <br/>
                                                    {!! Form::textarea('testimony', $data->testimony, ['class' => 'form-control border-input', 'placeholder' => 'Full Description of what happened']) !!}
                                                    </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-fill">Submit Testimony</button>
                                    </div>
                                    <div class="clearfix"></div>

                                {!! Form::close() !!}
                                    
                                    
                            </div>
                        </div>
                    </div>


                </div>


@endsection
