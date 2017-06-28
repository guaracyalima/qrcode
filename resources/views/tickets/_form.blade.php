<div class="form-body">
    <div class="form-group">
        {!! Form::label('quantidade', 'Quantidade:') !!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-list-ol"></i>
            </span>
            {!! Form::text('quantity', null ,['class' => 'form-control', 'placeholder' => '00']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('value', 'Valor:') !!}
        <div class="input-group">
            <span class="input-group-addon input-circle-left">
                <i class="fa fa-money"></i>
            </span>
            {!! Form::text('value', null ,['class' => 'form-control', 'placeholder' => '10,00%']) !!}
        </div>
    </div>

    <div class="form-group">


            {!! Form::hidden('code', null ) !!}

    </div>

    <div class="form-group">
        {!! Form::label('validity', 'Vencimento:') !!}
        <div class="input-group">
            <span class="input-group-addon input-circle-left">
                <i class="fa fa-calendar"></i>
            </span>
            {!! Form::input('date','validity', null ,['class' => 'form-control', 'placeholder' => '31/12/2020']) !!}
        </div>
    </div>