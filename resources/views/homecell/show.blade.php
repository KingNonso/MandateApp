@extends('user.app')

@section('title', 'Home Cell')

@section('content')

<div class="row">
                    <div class="col-md-12">
                    @if($homecell)
                    <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $homecell->name }}</h4>
                            </div>
                            <div class="content">
                                <p>Address</p>
                                {{ $homecell->address }}
                            </div>
                    </div>
                    <div class="card">
                            <div class="header">
                                <h4 class="title">Home Cell Members</h4>
                                <p class="category">Here is a list of your Home Cell members</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Phone</th>
                                    	<th>Email</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($members as $index => $m)
                                        <tr>
                                        	<td>{{ $index+1 }}</td>
                                        	<td>{{ $m->firstname.' '.$m->surname.' '.$m->othername }}</td>
                                        	<td>{{ $m->phone }}</td>
                                        	<td>{{ $m->email }}</td>
                                        	<td> @if(Auth::user()->id == $m->id)
                                                     {!! Form::open(['route' => ['cellmember.destroy', $m->id], 'method' => 'delete']) !!}
                                                    <button type="submit" class="btn btn-danger btn-fill btn-wd">Exit Home Cell</button>
                                                    {!! Form::close() !!}

                                                @else
                                                   <a href="{{ url('profile/'.$m->slug) }}" class="btn btn-primary btn-fill btn-wd">View Profile</a>
                                                @endif
                                                </td>
                                        </tr>
                                    @endforeach
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    @else
                        @if($homecells)
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Available Home Cell</h4>
                                    <p class="category">Here is a list of all available Home Cell for you to join in your church</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>S/N</th>
                                            <th>Home Cell Name</th>
                                            <th>Created By</th>
                                            <th>Phone</th>
                                            <th>Members</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($homecells as $index => $t)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td> {{ $t->name }}</td>
                                                <td>{{ $t->firstname.' '.$t->surname.' '.$t->othername }}</td>
                                                <td>{{ $t->phone }}</td>
                                                <td>{{ $t->members->count() }}</td>
                                                <td>
                                                    {!! Form::open(['route' => 'cellmember.store']) !!}
                                                    <input type="hidden" id="cell" name="cell" value="{{ $t->cell_id }}" />
                                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Join Home Cell</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        @endif

                    <div class="card">
                            <div class="header">
                                <h4 class="title">Create Home Cell</h4>
                                
                            </div>
                            <div class="content">
                                {!! Form::open(['route' => 'homecell.store']) !!}
                                

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Home Cell Name</label>
                                                <input type="text" class="form-control border-input" placeholder="What would you like to call your Home Cell" id="name" name="name">
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Home Cell Address</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" id="address" name="address" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Create Home Cell</button>
                                    </div>
                                    <div class="clearfix"></div>
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                       
                    
                    @endif
					</div>
                    


                </div>



@endsection
