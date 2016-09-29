    <div class="container">
        {!! Form::open(['route'=>'admin.calories.filter']) !!}

        <div class="'form-group">
            {!! Form::label('lb_from','From:') !!}
            {!! Form::text( 'from',null,['class'=>'form-control']) !!}
        </div>
        <div class="'form-group">
            {!! Form::label('lb_to','To:') !!}
            {!! Form::text( 'to',null,['class'=>'form-control', 'value'=>old('calories_expected') ]) !!}
        </div>

        <div class="'form-group">
            {!! Form::submit('Filter',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
