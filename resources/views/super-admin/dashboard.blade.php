@extends('admin.app')

@section('title', 'Dashboard')

@section('content')

<!-- /.content -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150,000</h3>

                <p>Total Churches</p>
            </div>
            <div class="icon">
                <i class="fa fa-institution"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>503,000</h3>

                <p>Soul Winning Teams</p>
            </div>
            <div class="icon">
                <i class="fa fa-hourglass"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>40,400,400</h3>

                <p>Total Souls Won</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65,000,000</h3>

                <p>Registered Users</p>
            </div>
            <div class="icon">
                <i class="fa fa-home"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create Church </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'homecell.store']) !!}
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('church_name', 'Name of Church') !!}
                        {!! Form::text('church_name', '', ['class' => 'form-control border-input', 'placeholder' => 'Enter the Name of the Church']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address of Church') !!} <br/>
                        {!! Form::textarea('address', '', ['class' => 'form-control border-input', 'placeholder' => 'Full Description of how to get there', 'rows' => 2]) !!}
                    </div>
                    <div class="form-group">
                        <label for="country">{{ __('Country') }}</label>

                        <div>
                            {!! Form::select('country', ['' => 'Select']+$countries,'',array('class'=>'form-control','id'=>'country'));!!}

                            @if ($errors->has('country'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state">{{ __('State') }}</label>

                        <div>
                            <select name="state" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" value="{{ old('state') }}" required autofocus>
                            </select>

                            @if ($errors->has('state'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">{{ __('City') }}</label>

                        <div>
                            <select name="city" id="city" class="form-control" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}" required autofocus>
                            </select>

                            @if ($errors->has('city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('province', 'Province') !!}
                        {!! Form::text('province', '', ['class' => 'form-control border-input']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('area', 'Area') !!}
                        {!! Form::text('area', '', ['class' => 'form-control border-input']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('district', 'District') !!}
                        {!! Form::text('district', '', ['class' => 'form-control border-input']) !!}
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Make Church Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('email', 'Email Address of Person') !!}
                        {!! Form::text('email', '', ['class' => 'form-control border-input']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('church_id', 'Church ID') !!}
                        {!! Form::text('church_id', '', ['class' => 'form-control border-input']) !!}
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> This Person is a Pastor
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>

</div>


<script src="http://demo.expertphp.in/js/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#country').change(function(){

            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:"GET",
                    url:"{{url('api/get-state-list')}}?country_id="+countryID,
                    success:function(res){
                        if(res){
                            $("#state").empty();
                            $("#state").append('<option>Select</option>');
                            $.each(res,function(key,value){
                                $("#state").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#state").empty();
                        }
                    }
                });
            }else{
                $("#state").empty();
                $("#city").empty();
            }
        });
        $('#state').on('change',function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type:"GET",
                    url:"{{url('api/get-city-list')}}?state_id="+stateID,
                    success:function(res){
                        if(res){
                            $("#city").empty();
                            $.each(res,function(key,value){
                                $("#city").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#city").empty();
                        }
                    }
                });
            }else{
                $("#city").empty();
            }

        });
    });

</script>


@endsection