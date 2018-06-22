@extends('admin.app')

@section('title', 'Announcement in details')

@section('content')

<div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                        <h4 class="box-title">{{ $details->subject }}</h4>
                                <div class="pull-right">
                                    <p>Date</p>
                                    {{ $details->created_at }}
                                </div>

                            </div>
                            </div>
                        <div class="box-body">

                            {{ $details->body }}


                        </div>

                        <div class="box-footer">
                            <h4 class="title">Comment</h4>

                            {!! Form::open(['route' => 'announcement.store']) !!}



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control border-input" placeholder="Here can be your description" id="description" name="description" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" disabled>Submit Comment</button>
                            </div>
                            <div class="clearfix"></div>

                            {!! Form::close() !!}


                                    </div>
                                   
                                
                                
					</div>
                    


                </div>



@endsection
