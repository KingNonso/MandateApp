@extends('user.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-target"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Souls Won</p>
                                            {{ $new_convert_count }}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-crown"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Testimonies</p>
                                            {{ $testimony_count }}

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Last day
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-announcement"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Announcement</p>
                                            {{ $announcement_count }}

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i> Updated this week
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-medall"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>My New Converts</p>
                                            +
                                            {{ $my_convert }}

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated 4 weeks ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Testimony </h4>
                                <p class="category">Latest mind boggling testimonies</p>
                            </div>
                            <div class="content">
                                <div class="table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                        <th>Testimony</th>
                                        <th>Action</th>
                                        </thead>
                                        @foreach ($testimonies as $testimony)
                                        <tr>

                                            <td><a href="{{ url('testimony/'.$testimony->slug) }}"> {{ $testimony->subject  }} </a></td>

                                            <td>

                                                <a href="{{ url('testimony/'.$testimony->slug) }}" class="btn btn-default"> View </a></td>
                                        </tr>
                                        @endforeach

                                    </table>

                                </div>


                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Announcements</h4>
                                <p class="category">Newest Announcements Published</p>
                            </div>
                            <div class="content">
                                <table class="table table-striped">
                                    <thead>
                                    <th>Subject</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($announcements as $announce)
                                    <tr>
                                        <td><a href="{{ url('announcement/'.$announce->slug) }}"> {{ $announce->subject  }} </a></td>

                                        <td>

                                            <a href="{{ url('announcement/'.$announce->slug) }}" class="btn btn-default"> View </a></td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                </table>


                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



@endsection
