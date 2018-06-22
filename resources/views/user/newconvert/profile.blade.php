@extends('user.app')

@section('title', 'Profile of New Convert')

@section('content')

<div class="row">
                    <div class="col-md-12">
                    <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $convert->firstname.' '. $convert->surname }}</h4>
                            </div>
                            <div class="content">
                            <p>Address</p>
                            <Address>
                            {{ $convert->address }}
                            </Address>
                               
                            </div>
                    </div>
                    <div class="card">
                            <div class="header">
                                <h4 class="title">Actions taken</span></a></h4>
                                
                                <p class="category">Here is a list of the all the actions taken for this new convert
                                
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>By Who</th>
                                    	<th>Action</th>
                                      	<th>Feedback</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                    @foreach($actions as $index => $m)
                                        <tr>
                                        	<td>{{ $index+1 }}</td>
                                        	<td>{{ $m->winner }}</td>
                                        	<td>{{ $m->action }}</td>
                                        	<td>{{ $m->feedback }}</td>
                                        	<td>{{ $m->created_at }}</td>
                                        	
                                        </tr>
                                    @endforeach
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">New Possible Actions</h4>
                            </div>
                            <div class="content">
                                {!! Form::open(['route' => 'actionable.store']) !!}
                                
                                    {{ Form::hidden('new_convert_id',$convert->id)}}
                                    <div class="row">
                                        
                                        
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('action', 'Action') !!} <br/>
                                                    {!! Form::select('action', ['Phone Call' => 'Phone Call', 'Send Text Message' => 'Send Text Message', 'Visit (Office/ workplace)'=> 'Visit (Office/ workplace)', ' Visit (Home)' => 'Visit (Home)','Online Conversation (via E-Mail/ Social media)' => 'Online Conversation (via E-Mail/ Social media)','Brought to Church' => 'Brought to Church','Attended Foundation School' => 'Attended Foundation School', 'Joined a Unit' => 'Joined a Unit'], null, ['placeholder' => 'Select action ...','class' => 'form-control border-input']) !!}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('feedback', 'Action Detail') !!}
                                                    {!! Form::textarea('feedback', '', ['class' => 'form-control border-input', 'placeholder' => 'Enter full detail and description of the action you took','rows' => 2]) !!}
                                                    </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-fill btn-wd">Submit Action as Done</button>
                                    </div>
                                    <div class="clearfix"></div>

                                {!! Form::close() !!}
                                    
                                    
                                </form>
                            </div>
                        </div>


               
					</div>
                    
                    </div>



@endsection
