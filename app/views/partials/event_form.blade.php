<div class="well colors col-sm-offset-2 col-sm-8 col-md-8">

    <div class="form-group @if($errors->has('title')) has-error @endif">
        {{ Form::label('title', 'Event Name') }}
        {{ Form::text('title', null, ['class' => 'form-control'])}}
    </div>

    <div class="form-group @if($errors->has('description')) has-error @endif">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, ['class' => 'form-control'])}}
    </div>

    <div class="form-group @if($errors->has('price')) has-error @endif">
        {{ Form::label('price', 'Location') }}
        {{ Form::text('price', null, ['class' => 'form-control'] )}}
    </div>


    <div class="form-group @if($errors->has('start')) has-error @endif">
        {{ Form::label('start', 'Starting time') }}
        {{ Form::text('start', null, ['class' => 'form-control', 'id' => 'datetimepicker'])}}
    </div>

    <div class="form-group @if($errors->has('end')) has-error @endif">
        {{ Form::label('end', 'Ending time') }}
        {{ Form::text('end', null, ['class' => 'form-control', 'id' => 'datetimepicker2'])}}
    </div>

    {{ Form::submit('Send this form!') }}
    
</div>