@extends('user.app')

@section('title', 'Testimony in details')

@section('content')

<div class="row">
                    <div class="col-md-12">
                            <div class="card">
                                    <div class="header">
                                        <h4 class="title">{{ $details->subject }}</h4>
                                    </div>
                                    <div class="content">
                                        <p>Category</p>
                                        {{ $details->category }}
                                    </div>
                            </div>
                            <div class="card">
                                    
                                    <div class="content">
                                            {{ $details->testimony }}
        
                                    </div>
                                    <div class="header">
                                            <h4 class="title">  {{ $details->person }} </h4>
                                            <p class="category">Church: {{ $details->church }}</p>
                                    </div>
                                </div>
                    
                                <div class="card">
                                        <div class="header">
                                            <h4 class="title">Comment</h4>
                                            
                                        </div>
                                        <div class="content">
                                            {!! Form::open(['route' => 'testimony.store']) !!}
                                                        
                                                
            
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
                    


                </div>



@endsection
