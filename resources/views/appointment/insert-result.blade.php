@extends('layouts.master-layouts')
@section('title') {{ __('Book Appointment') }} @endsection
@section('css')
<!-- Calender -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/fullcalendar/fullcalendar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
      href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css"
      href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}">
<style>
    .topheader {
        box-sizing: border-box;
        width: 100%;
        height: 66px;
        left: 22px;
        top: 21px;
        background: #F8F9FA;
        border: 1.5px solid #EFF2F7;
        align-items: center;
        border-radius: 2px;
        display: flex;
        flex-wrap: wrap;

    }
    .whole-content {
        width: 1119px;
        height: 1026px;
        left: 150px;
        top: 197px;
        /* White Color */
        background: #FFFFFF;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.03);
        border-radius: 2px;
    }

    .table-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .appointment-container {
        width: 100%
    }
    .form-item {
        display: flex;
        margin: 4px 0px;
    }
    .appointment-checkbox {
        margin-right: 5px;
        border: 1px solid #686868;
        border-radius: 2px;
        height: 22px;
        width: 22px;
        flex-shrink: 0;
    }
    .appointment-checkbox.selected {
        background-color: #9AE0F7;
        border: 1px solid #9AE0F7;
    }
    .appointment-label {
        background: rgba(255, 166, 0, 0.2);
        height: 22px;
        border-left: 2px solid rgba(255, 166, 0, 0.8);
        border-radius: 0px 8px 8px 0px;   
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 10px;
        line-height: 12px;
        padding: 5px 8px;
    }
    .appointment-label.green{
        background: rgba(56, 203, 137, 0.2);
        border-left: 2px solid #0ACF83;
    }
    .divider{
        margin: 18px 0px;
        height: 2px;
        background-color:rgba(239, 242, 247, 0.7);
        width: 100%;
    }
    .table-row{
        display: flex;
        height: 42px;
        display: flex;
        align-items: center;
    }
    .table-row .col-3 {
        font-family: 'Courier New';
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 16px;
    }
    .title {
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 15px;
    }
    .textClass{
        padding: 10px 0px;
    }
    .textUnit{
        font-family: 'Courier New';
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 16px;
        /* identical to box height */
        /* Natural Color */
        color: #333333;
    }
</style>
@endsection
@section('body')
<body data-topbar="dark" data-layout="horizontal">
    @endsection
    @section('content')
    <!-- start page title -->
    @component('components.breadcrumb')
    @slot('title') New Appointment @endslot
    @slot('li_1') Dashboard @endslot
    @slot('li_2') Booked Appointment @endslot
    @endcomponent
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <a href="{{ url('/appointment/create') }}"
               class="btn btn-primary text-white waves-effect waves-light mb-4">
                <i class="mdi mdi-arrow-left  font-size-16 align-middle mr-2"></i> {{ __('Back Appointment List') }}
            </a>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-container">
                    <div class="topheader">
                        <div class="col-2 page-title-box"><strong>{{ __('Id Appointment') }}</strong></div>
                        <div class="col-4 page-title-box"><strong>{{ __('Name') }}</strong></div>
                        <div class="col-2 page-title-box"><strong>{{ __('Age') }}</strong></div>
                        <div class="col-2 page-title-box"><strong>{{ __('Date') }}</strong></div>
                        <div class="col-1 page-title-box"><strong>{{ __('Unit') }}</strong></div>
                        <div class="col-1 page-title-box"><img src="{{ URL::asset('assets/images/left-arrow.svg') }}" style="margin-right: 12px;"><img src="{{ URL::asset('assets/images/right-arrow.svg') }}"></div>
                    </div>
                    <div class="divider" ></div>
                    <div class="row appointment-container">
                        <div class="col-2">
                            <div class="form-item">
                                <div class="appointment-checkbox selected"></div>
                                <div class="appointment-label">Hemo</div>
                            </div>
                            <div class="form-item">
                                <div class="appointment-checkbox"></div>
                                <div class="appointment-label">PSO</div>
                            </div>
                            <div class="form-item">
                                <div class="appointment-checkbox"></div>
                                <div class="appointment-label green">LEUCF</div>
                            </div>
                            <div class="form-item">
                                <div class="appointment-checkbox"></div>
                                <div class="appointment-label green">FCULT</div>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="hemo" style="display: flex;flex-direction: column">
                                <div class="col-8"><h5>HEMO - HEMOGRAMA COMPLETO</h5></div> 
                                <div class="table-row">
                                    <div class="col-8">Resultado: Automático</div>
                                    <div class="col-4"><div class="textUnit">Amostra: EDTA</div></div>
                                </div>
                            </div>



                            <div class="serie">
                                <div class="col-8"><h5>SÉRIE VERMELHO</h5></div> 
                                <div style="display: flex">
                                    <div class="col-8" >
                                        <div class="table-row"> 
                                            <div class="col-3">Hemácias: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico" id="tbHemácias" data-id_campo="tbHemácias" onkeydown="calcular_formulas()"></div>
                                            <div class="col-3">milhões/mm3</div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Hemoglobina: </div>
                                            <div class="col-2"><input type="text" name="hemoglobina" maxlength="5" size="6" class="campo_numerico" id="tbHemoglobina" data-id_campo="tbHemoglobina" onkeydown="calcular_formulas()"></div>
                                            <div class="col-3">g/dl</div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Hematócrito: </div>
                                            <div class="col-2"><input type="text" name="hematócrito" maxlength="5" size="6" class="campo_numerico" id="tbHematócrito" data-id_campo="tbHematócrito" onkeydown="calcular_formulas()"></div>
                                            <div class="col-3">%</div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">V.C.M: </div>
                                            <div class="col-2" id="vcm">---</div>
                                            <div class="col-3">pg</div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">H.C.M: </div>
                                            <div class="col-2" id="hcm">---</div>
                                            <div class="col-3">um³</div>
                                            <div class="col-4">	</div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">C.H.C.M: </div>
                                            <div class="col-2" id="chcm">---</div>
                                            <div class="col-3">g/dl</div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">R.D.W </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3">%</div>
                                            <div class="col-4"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="col-12 table-row textUnit">milhões/mm3</div> 
                                        <div class="col-12 table-row textUnit">g/dl</div> 
                                         <div class="col-12 table-row textUnit"></div> 
                                        <div class="col-12 table-row textUnit">pg</div> 
                                        <div class="col-12 table-row textUnit">um³</div> 
                                        <div class="col-12 table-row textUnit">g/dl</div> 
                                        <div class="col-12 table-row textUnit">%</div> 
                                    </div>
                                </div>
                                <div class="col-8  table-row">
                                    <input type="text" maxlength="60" size="61" name="tbResultado2793" class="tbResultado2793">
                                </div>
                                <div class="col-8  table-row">
                                    <input type="text" maxlength="60" size="61" name="tbResultado2793" class="tbResultado2793">
                                </div>
                                <div class="col-8  table-row">
                                    <input type="text" maxlength="50" size="50" name="tbResultado2793" class="tbResultado2793">
                                </div>
                            </div>


                            <div class="serie">
                                <div class="col-8"><h5>SÉRIE BRANCA</h5></div> 
                                <div style="display: flex">
                                    <div class="col-8" >
                                        <div class="table-row"> 
                                            <div class="col-3">Leucócitos: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">/mm3</div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3"> </div>
                                            <div class="col-2"></div>
                                            <div class="col-3"></div>
                                            <div class="col-4"></div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Mielócitos: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">%</div>
                                            <div class="col-4 textUnit">0/mm3</div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Metamielócitos: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">%</div>
                                            <div class="col-4 textUnit">0/mm3</div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Bastonetes: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">%</div>
                                            <div class="col-4 textUnit">0/mm3</div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Segmentados: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">%</div>
                                            <div class="col-4 textUnit">1.040/mm3</div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Eosinófilos: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">%</div>
                                            <div class="col-4 textUnit">1.040/mm3</div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Basófilos: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">%</div>
                                            <div class="col-4 textUnit">20/mm3</div>
                                        </div>
                                        <div class="table-row"> 
                                            <div class="col-3">Linfócitos: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">%</div>
                                            <div class="col-4 textUnit">0/mm3</div>
                                        </div>
                                        <div class="table-row">  
                                            <div class="col-3">Monócitos: </div>
                                            <div class="col-2"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-3 textUnit">%</div>
                                            <div class="col-4 textUnit">800/mm3</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="col-12 textUnit">4.000 - 10.000 /mm³</div> 
                                        <div class="col-12 textUnit">	%/mm³</div> 
                                        <div class="col-12 textUnit">0 - 0 0 - 0</div> 
                                        <div class="col-12 textUnit">0 - 1 0 - 100</div> 
                                        <div class="col-12 textUnit">0 - 5 Até  500</div> 
                                        <div class="col-12 textUnit">0 - 5 Até  500</div> 
                                        <div class="col-12 textUnit">50 - 70 2000 - 7.000</div> 
                                        <div class="col-12 textUnit">1 - 7 40 - 700</div> 
                                        <div class="col-12 textUnit">0 - 2 0 - 200</div> 
                                        <div class="col-12 textUnit">20 - 40 800 - 4.000</div> 
                                    </div>
                                </div>
                                <div class="col-8  table-row">
                                    <input type="text" maxlength="50" size="50" name="tbResultado2793" class="tbResultado2793">
                                </div>
                            </div>
                            <div class="serie">
                                <div class="col-8"><h5>SÉRIE BRANCA</h5></div> 
                                <div style="display: flex">
                                    <div class="col-8" >
                                        <div class="table-row"> 
                                            <div class="col-3">Plaquetas: </div>
                                            <div class="col-3"><input type="text" name="hemácias" maxlength="5" size="6" class="campo_numerico"></div>
                                            <div class="col-2 textUnit">/mm3</div>
                                            <div class="col-4"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="col-12 textUnit">150.000 - 450.000/mm3</div> 
                                    </div>
                                </div>
                                <div class="col-8  table-row">
                                    <input type="text" maxlength="50" size="50" name="tbResultado2793" class="tbResultado2793">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <form action="{{ url('appointment-store') }}" id="" method="POST">
                @csrf 
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" style="width: 100px;">
                            {{ __('Cancle') }}
                        </button>
                        <button type="submit" class="btn btn-primary" style="width: 100px;">
                            {{ __('Save') }}
                        </button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<!-- Calender Js-->
<script src="{{ URL::asset('assets/libs/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/moment/moment.js') }}"></script>
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.js') }}"></script>
<!-- Get App url in Javascript file -->
<script type="text/javascript">
    function calcular_formulas(data) {
        var hemácias = $('#tbHemácias').val();
        var hemoglobina = $('#tbHemoglobina').val();
        console.log(hemoglobina);
        var hematócrito = $('#tbHematócrito').val();
        $('#tbHemoglobina').val((hematócrito/3).toFixed(2));
        $('#vcm').html((hematócrito/hemácias*10).toFixed(2));
        $('#hcm').html((hemoglobina/hemácias*10).toFixed(2));
        $('#chcm').html((hemoglobina/hematócrito*100).toFixed(2));
    }
</script>
<!-- Init js-->
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/appointment.js') }}"></script>
<script>
</script>
@endsection
