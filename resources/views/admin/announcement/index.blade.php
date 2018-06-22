@extends('admin.app')

@section('title', 'Announcement')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Showing  Page {{ $announcements->currentPage().' of '.$announcements->lastPage() }}</h3>
                <p class="category">{{ $announcements->count() }} announcements per page. Total of {{ $announcements->total() }} announcements</p>

                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $announcements->links() }}

                    </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th colspan="4">Action</th>
                    </thead>
                    <tbody>
                    @foreach ($announcements as $index => $announce)
                    <tr>
                        <td>{{ $index+1 }}</td>

                        <td><a href="{{ url('announcement/'.$announce->slug) }}"> {{ $announce->subject  }} </a></td>

                        <td> {{ $announce->created_at  }} </td>
                        <td>
                            <a href="{{ url('announcement/'.$announce->slug.'/edit') }}" class="btn btn-warning btn-flat"> Edit </a>

                        </td>
                        <td>
                            <a href="{{ url('announcement/'.$announce->slug) }}" class="btn btn-default btn-flat"> View </a>

                        </td>
                        <td>
                            {!! Form::model( $announce, ['method' => 'put', 'route' => ['approve_announcement', $announce->id] ]) !!}
                            <button type="submit" class="btn btn-success btn-flat">Approve </button>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open(['route' => ['announcement.destroy', $announce->id], 'method' => 'delete']) !!}
                            <button type="submit" class="btn btn-danger btn-flat">Delete </button>
                            {!! Form::close() !!}


                        </td>
                    </tr>
                    @endforeach


                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <a href="{{ url('announcement/create') }}" class="btn btn-danger btn-lg pull-left">Create New Announcement</a>

                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $announcements->links() }}

                </ul>
            </div>

        </div>
        <!-- /.box -->
    </div>
</div>


@endsection