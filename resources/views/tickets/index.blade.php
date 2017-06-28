@extends('layouts.index')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Gerenciar cupons</span>
                    </div>
                    <div class="actions btn-set">
                        <a href="{{route('create')}}" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Criar</a>

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">


                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Ferramentas <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                Imprimir </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Salvar como PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Exportar excell </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th class="table-checkbox">
                                #
                            </th>
                            <th>
                                Codigo
                            </th>
                            <th>
                                Valor
                            </th>
                            <th>
                                Validade
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Ações
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $item)
                        <tr class="odd gradeX">
                            <td>
                                {{$item->id}}
                            </td>
                            <td>
                                <img src="data:image/png;base64, {!! $item->code!!}" alt="">
                            </td>
                            <td>
                                {{$item->value}}
                            </td>
                            <td>
                                {{$item->validity}}
                            </td>
                            <td>
									<span class="label label-sm label-success">
									Approved </span>
                            </td>
                            <td>
                                <a href="{{ route('edit', ['id' => $item->id]) }}" class="btn btn-info btn-sm">Editar</a>
                                <a href="{{ route('destroy', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Deletar</a>
                            </td>
                        </tr>


                            @endforeach

                        </tbody>

                    </table>
                    {!!  $tickets->render() !!}

                    <p style="width: 500px; height: 500px; ">{!! QrCode::generate('Amor meu') !!}</p>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


@endsection