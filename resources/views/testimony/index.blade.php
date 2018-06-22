@extends('user.app')

@section('title', 'Testimonies')

@section('content')

<div class="row">
                    <div class="col-md-12">
                    <div class="card">
                            <div class="header">
                                <h4 class="title">Testimonies</h4>
                            </div>
                            <div class="content">
                               
                            </div>
                    </div>
                    <div class="card">
                            <div class="header">
                                    <h4 class="title">Showing  Page {{ $testimonies->currentPage().' of '.$testimonies->lastPage() }}
                                    <a href="{{ url('testimony/create') }}" class="btn btn-danger btn-lg pull-right">Add New Testimony</a>
                                    </h4>
                                    
                                    <p class="category">{{ $testimonies->count() }} testimonies per page. Total of {{ $testimonies->total() }} testimonies</p>
                                </div>
                            <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                            <thead>
                                                    <th>ID</th>
                                                    <th>Testimony</th>
                                                    <th>Testifier</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </thead>
                                            @foreach ($testimonies as $index => $testimony)
                                            <tr>
                                                    <td>{{ $index+1 }}</td>
                                                 
                                                    <td><a href="{{ url('testimony/'.$testimony->slug) }}"> {{ $testimony->subject  }} </a></td>
                                                    
                                                    <td> {{ $testimony->person  }} </td>
                                                    <td> {{ $testimony->category  }} </td>
                                                    <td>
                                                        @if(Auth::user()->id == $testimony->user_id)
                                                        <a href="{{ url('testimony/'.$testimony->slug.'/edit') }}" class="btn btn-warning btn-fill"> Edit </a>
                                                        @endif
                                                <a href="{{ url('testimony/'.$testimony->slug) }}" class="btn btn-default"> View </a></td>
                                                </tr>
                                            @endforeach
                                        
                                            
                                        </tbody>
                                    </table>
    
                                </div>
                        </div>
                        <div class="card">
                                <div class="content">

                                
                                
                                {{ $testimonies->links() }}

                                    @if(Request::path() != 'testified')
                                    <a href="{{ url('/testified') }}" class="btn btn-danger btn-lg pull-right">Show Only My Own Testimony</a>
                                    @endif

                            </div>
                        </div>
                    
					</div>
                    


                </div>



@endsection
