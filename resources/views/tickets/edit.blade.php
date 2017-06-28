@extends('layouts.index')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Editar cupom</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="portlet-body form">
                                {!! Form::model($ticket, ['route' => 'update', 'class' => 'form-inline', 'id' => 'form-create']) !!}

                                        @include('tickets._form')

                                        <div class="form-group">
                                            <button type="submit" class="btn blue">
                                                <i class="fa fa-qrcode" aria-hidden="true"></i>
                                                Alterar
                                            </button>
                                            <button type="button" class="btn default">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                Cancelar
                                            </button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>


@endsection