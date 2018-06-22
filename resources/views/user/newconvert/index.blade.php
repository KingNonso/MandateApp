@extends('user.app')

@section('title', 'New Converts/ Souls Won')

@section('content')

<div class="row">
                    <div class="col-md-12">
                    <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $team->name }}</h4>
                            </div>
                            <div class="content">
                                {{ $team->description }}
                            </div>
                    </div>
                    <div class="card">
                            <div class="header">
                                <h4 class="title">Souls Won <span class="badge">{{ $members->count() }}</span></a>
                                <a href="{{ url('newconvert/create') }}" class="btn btn-danger btn-lg pull-right">Add New Convert</a>
                                </h4>
                                
                                <p class="category">Here is a list of the souls won by your team members
                                
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Phone</th>
                                    	<th>Email</th>
                                    	<th>Date</th>
                                    	<th>Winner</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($members as $index => $m)
                                        <tr>
                                        	<td>{{ $index+1 }}</td>
                                        	<td>{{ $m->firstname.' '.$m->surname }}</td>
                                        	<td>{{ $m->phone }}</td>
                                        	<td>{{ $m->email }}</td>
                                        	<td>{{ $m->created_at }}</td>
                                        	<td>{{ $m->winner }}</td>
                                        	<td> <a href="{{ url('newconvert/'.$m->slug) }}" class="btn btn-primary ">View Profile</a> </td>
                                        </tr>
                                    @endforeach
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    
					</div>
                    


                </div>



@endsection
