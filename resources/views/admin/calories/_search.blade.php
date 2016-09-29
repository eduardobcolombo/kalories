@include('errors._check')

    <div class="container">
        {!! Form::open(['route'=>'admin.calories.filter']) !!}

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('lb_from','From:') !!}
                    {!! Form::date( 'from',null,['class'=>'form-control', 'id' => 'from']) !!}

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('lb_to','To:') !!}
                    {!! Form::date( 'to',null,['class'=>'form-control', 'id' => 'to']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <br />
                    {!! Form::submit('Filter',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
