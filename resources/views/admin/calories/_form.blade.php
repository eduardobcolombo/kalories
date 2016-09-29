<div class="row">
    <div class="col-md-2">
        <div class="'form-group">
            {!! Form::label('lb_name','Data:') !!}
            {!! Form::text( 'date',null,['class'=>'form-control', 'id'=>'dateCalorie']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('lb_time','Time:') !!}
            {!! Form::text( 'time',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('lb_number_of_calories','Number of calories:') !!}
            {!! Form::text( 'number_of_calories',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            {!! Form::label('lb_text','Text:') !!}
            {!! Form::text( 'text',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>



<div class="'form-group">
    {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
</div>