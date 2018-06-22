@extends('admin.app')

@section('title', 'Testimonies')

@section('content')

<div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Showing  Page {{ $testimonies->currentPage().' of '.$testimonies->lastPage() }}

                                </h3>

                                <p class="category">{{ $testimonies->count() }} testimonies per page. Total of {{ $testimonies->total() }} testimonies</p>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        {{ $testimonies->links() }}

                                    </ul>
                                </div>
                            </div>

                            <div class="box-header">
                                </div>
                            <div class="box-body table-responsive no-padding">
                                    <table class="table table-striped">
                                            <thead>
                                                    <th>ID</th>
                                                    <th>Testimony</th>
                                                    <th>Testifier</th>
                                                    <th>Category</th>
                                                    <th colspan="4">Action</th>
                                                </thead>
                                            @foreach ($testimonies as $index => $testimony)
                                            <tr>
                                                    <td>{{ $index+1 }}</td>
                                                 
                                                    <td><a href="{{ url('testimony/'.$testimony->slug) }}"> {{ $testimony->subject  }} </a></td>
                                                    
                                                    <td> {{ $testimony->person  }} </td>
                                                    <td> {{ $testimony->category  }} </td>
                                                <td>
                                                    <a href="{{ url('testimony/'.$testimony->slug.'/edit') }}" class="btn btn-warning btn-flat"> Edit </a>

                                                </td>
                                                <td>
                                                    <a href="{{ url('testimony/'.$testimony->slug) }}" class="btn btn-default btn-flat"> View </a>

                                                </td>
                                                <td>
                                                    {!! Form::model( $testimony, ['method' => 'put', 'route' => ['approve_testimony', $testimony->id] ]) !!}
                                                    <button type="submit" class="btn btn-success btn-flat">Approve </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    {!! Form::open(['route' => ['testimony.destroy', $testimony->id], 'method' => 'delete']) !!}
                                                    <button type="submit" class="btn btn-danger btn-flat">Delete </button>
                                                    {!! Form::close() !!}


                                                </td>
                                            </tr>
                                            @endforeach
                                        
                                            
                                        </tbody>
                                    </table>
    
                                </div>
                            <div class="box-footer clearfix">
                                <a href="{{ url('testimony/create') }}" class="btn btn-danger btn-lg">Add New Testimony</a>

                                <ul class="pagination pagination-sm no-margin pull-right">
                                    {{ $testimonies->links() }}

                                </ul>
                            </div>

                        </div>

					</div>
                    


                </div>



@endsection
