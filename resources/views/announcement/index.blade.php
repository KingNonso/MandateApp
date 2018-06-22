@extends('user.app')

@section('title', 'Announcements')

@section('content')

<div class="row">
                    <div class="col-md-12">
                    <div class="card">
                            <div class="header">
                                <h4 class="title">Announcements</h4>
                            </div>
                            <div class="content">
                               
                            </div>
                    </div>
                    <div class="card">
                            <div class="header">
                                    <h4 class="title">Showing  Page {{ $announcements->currentPage().' of '.$announcements->lastPage() }}
                                    <a href="{{ url('announcement/create') }}" class="btn btn-danger btn-lg pull-right">Create New Announcement</a>
                                    </h4>
                                    
                                    <p class="category">{{ $announcements->count() }} announcements per page. Total of {{ $announcements->total() }} announcements</p>
                                </div>
                            <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                            <thead>
                                                    <th>ID</th>
                                                    <th>Subject</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </thead>
                                        <tbody>
                                        @foreach ($announcements as $index => $announce)
                                            <tr>
                                                    <td>{{ $index+1 }}</td>
                                                 
                                                    <td><a href="{{ url('announcement/'.$announce->slug) }}"> {{ $announce->subject  }} </a></td>
                                                    
                                                    <td> {{ $announce->created_at  }} </td>
                                                    <td>
                                                        @if(Auth::user()->id == $announce->user_id)
                                                        <a href="{{ url('announcement/'.$announce->slug.'/edit') }}" class="btn btn-warning btn-fill"> Edit </a>
                                                        @endif

                                                        <a href="{{ url('announcement/'.$announce->slug) }}" class="btn btn-default"> View </a></td>
                                                </tr>
                                            @endforeach
                                        
                                            
                                        </tbody>
                                    </table>
    
                                </div>
                        </div>
                        <div class="card">
                                <div class="content">

                                
                                
                                {{ $announcements->links() }}
                                    @if(Request::path() != 'announced')
                                    <a href="{{ url('/announced') }}" class="btn btn-danger btn-lg pull-right">Show Announcements I Published</a>
                                    @endif
                            </div>
                        </div>
                    
					</div>
                    


                </div>



@endsection
