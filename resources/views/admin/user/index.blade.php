@extends('admin.app')

@section('title', 'Registered Users')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Showing  Page {{ $testimonies->currentPage().' of '.$testimonies->lastPage() }}

                </h3>

                <p class="category">{{ $testimonies->count() }} users per page. Total of {{ $testimonies->total() }} users</p>

                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $testimonies->links() }}

                    </ul>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
                <table class="table table-striped">
                    <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th colspan="2">Action</th>
                    </thead>
                    @foreach ($testimonies as $index => $testimony)
                    <tr>
                        <td>{{ $index+1 }}</td>

                        <td><a href="{{ url('profile/'.$testimony->slug) }}"> {{ $testimony->firstname .' '.$testimony->surname }} </a></td>

                        <td> {{ $testimony->email  }} </td>
                        <td> {{ $testimony->phone  }} </td>
                        <td>
                            <a href="{{ url('profile/'.$testimony->slug.'/edit') }}" class="btn btn-warning btn-flat"> Edit </a>

                        </td>
                        <td>
                            <a href="{{ url('profile/'.$testimony->slug) }}" class="btn btn-default btn-flat"> View </a>

                        </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="box-footer clearfix">
                <a href="{{ url('testimony/create') }}" class="btn btn-danger btn-lg">Add New User</a>

                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $testimonies->links() }}

                </ul>
            </div>

        </div>

    </div>



</div>



@endsection


