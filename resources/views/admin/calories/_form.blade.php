<div class="'form-group">
    {!! Form::label('lb_name','Data:') !!}
    {!! Form::text( 'date',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('lb_time','Time:') !!}
    {!! Form::text( 'time',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('lb_text','Text:') !!}
    {!! Form::text( 'text',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('lb_number_of_calories','Number of calories:') !!}
    {!! Form::text( 'number_of_calories',null,['class'=>'form-control']) !!}
</div>

<div class="'form-group">
    {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
</div>