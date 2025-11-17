@extends('admin.core.admin')
@section('content')
<style>
    .btn-reservation.focus-btn-reservation{
        display: none;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.title_dashboard')}}</a></li>
                                <li class="breadcrumb-item active">Agendamento</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Agendamento</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    @if($existeDuplicados)
                        <div class="alert alert-warning d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Atenção:</strong> Existem reservas duplicadas.
                            </div>

                            <a href="{{ route('admin.dashboard.reservation.index', ['duplicados' => 1]) }}"
                            class="alert-link text-decoration-underline">
                            Ver duplicadas
                            </a>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="col-12">
                                        <form action="{{route('admin.dashboard.reservation.index')}}" method="GET" class="mb-4">
                                            <div class="row g-3 align-items-end">

                                                <!-- Título -->
                                                <div class="col-md-3">
                                                    <label for="name_complete" class="form-label">Nome</label>
                                                    <input type="text" name="name_complete" id="name_complete" value="{{ request('name_complete') }}" 
                                                        class="form-control" placeholder="Pesquisar pelo nome">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input type="text" name="email" id="email" value="{{ request('email') }}" 
                                                        class="form-control" placeholder="Pesquisar pelo email">
                                                </div>

                                                <!-- Data -->
                                                <div class="col-md-2">
                                                    <label for="date" class="form-label">Data</label>
                                                    <input type="date" name="date" id="date" value="{{ request('date') }}" 
                                                        class="form-control">
                                                </div>

                                                <div class="col-12 col-lg-2">
                                                    <label for="filterHours" class="form-label">Horário</label>
                                                    <select name="hours" id="filterHours" 
                                                        class="form-control text-muted border-white"
                                                        {{ request('date') ? '' : 'disabled' }}>

                                                        <option value="">Selecione a data primeiro</option>

                                                        <option value="18:00" {{ request('hours') == '18:00' ? 'selected' : '' }}>18:00</option>
                                                        <option value="18:30" {{ request('hours') == '18:30' ? 'selected' : '' }}>18:30</option>
                                                        <option value="19:00" {{ request('hours') == '19:00' ? 'selected' : '' }}>19:00</option>
                                                        <option value="19:30" {{ request('hours') == '19:30' ? 'selected' : '' }}>19:30</option>
                                                        <option value="20:00" {{ request('hours') == '20:00' ? 'selected' : '' }}>20:00</option>
                                                        <option value="20:30" {{ request('hours') == '20:30' ? 'selected' : '' }}>20:30</option>
                                                        <option value="21:00" {{ request('hours') == '21:00' ? 'selected' : '' }}>21:00</option>
                                                        <option value="21:30" {{ request('hours') == '21:30' ? 'selected' : '' }}>21:30</option>
                                                        <option value="22:00" {{ request('hours') == '22:00' ? 'selected' : '' }}>22:00</option>
                                                    </select>
                                                </div>

                                                <!-- Categoria -->
                                                <div class="col-md-2">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select name="status" class="form-select">
                                                        <option disabled selected>Selecione um status</option>
                                                        <option value="confirmed">Confirmado</option>
                                                        <option value="canceled">Cancelado</option>
                                                    </select>
                                                </div>

                                                <!-- Botões -->
                                                <div class="row justify-content-end mt-2 p-0">
                                                    <div class="col-md-3 d-flex gap-2 p-0 justify-content-end">
                                                        @if (request()->has('name_complete') || request()->has('date') || request()->has('status') || request()->has('email') || request()->has('duplicados'))
                                                            <a href="{{ route('admin.dashboard.reservation.index') }}" class="btn btn-outline-secondary w-auto">
                                                                <i class="bi bi-x-circle"></i> Limpar
                                                            </a>
                                                        @endif
                                                        <button type="submit" class="btn btn-primary w-auto text-black">
                                                            <i class="bi bi-search text-black"></i> Filtrar
                                                        </button>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar', 'grupo.criar']))                                                        
                                        <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#reservation-create"><i class="mdi mdi-plus-circle me-1"></i> {{__('dashboard.btn_create')}} </button>
                                    @endif --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="reservation-create" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width: 760px">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_create')}} </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body p-2 px-3 px-md-4">
                                                    <form action="{{route('admin.dashboard.reservation.store')}}" method="POST">
                                                        @csrf
                                                        @include('admin.blades.reservation.form')                                                   
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                                <div class="col-12 d-flex justify-between">
                                    <div class="col-6">
                                        @if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar','grupo.remover']))
                                            {{-- <button id="btSubmitDelete" data-route="{{route('admin.dashboard.reservation.destroySelected')}}" type="button" class="btSubmitDelete btn btn-danger" style="display: none;">Deletar selecionados</button> --}}
                                        @endif
                                    </div>                                    
                                </div>
                            </div>
    
                            <div class="table-responsive">
                                <table class="table-sortable table table-centered table-nowrap table-striped" id="products-datatable">
                                    <thead>                                        
                                        <tr>
                                            <th class="bs-checkbox">
                                                <label><input name="btnSelectAll" type="checkbox"></label>
                                            </th>
                                            <th>Nome</th>
                                            <th>Data de agendamento</th>
                                            <th>Horário do agendamento</th>
                                            <th>Qtd de pessoas</th>
                                            <th>Área reservada</th>
                                            <th>Status </th>
                                            <th style="width: 85px;">{{__('dashboard.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody data-route="">
                                        @php
                                            $status = request()->get('status');
                                        @endphp

                                        @if (request()->has('duplicados'))
                                            <h4>Reservas duplicadas</h4>

                                        @elseif ($status === 'confirmed')
                                            <h4>Reservas confirmadas</h4>

                                        @elseif ($status === 'canceled')
                                            <h4>Reservas canceladas</h4>

                                        @elseif ($status === 'stand_by')
                                            <h4>Aguardando resposta</h4>

                                        @elseif (!request()->all() || empty(request()->all()))
                                            <h4>Reservas pendentes</h4>

                                        @endif

                                        @foreach($reservations as $key => $reservation)
                                            <tr data-code="{{$reservation->id}}">
                                                <td class="bs-checkbox">
                                                    <label><input data-index="{{$key}}" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="{{$reservation->id}}"></label>
                                                </td>
                                                <td>
                                                   {{$reservation->name_complete}}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    {{ $reservation->hours }}
                                                </td>
                                                <td>
                                                    {{ $reservation->number_of_people . ' pessoa(s)'}}
                                                </td>
                                                <td>
                                                    {{ $reservation->location_area}}
                                                </td>
                                                <td>
                                                    @switch($reservation->status)
                                                        @case('confirmed')
                                                            <span class="badge bg-success">Confirmado</span>
                                                            @break

                                                        @case('canceled')
                                                            <span class="badge bg-danger">Cancelado</span>
                                                            @break

                                                        @case('stand_by')
                                                            <span class="badge bg-warning text-dark">Aguardando confirmação</span>
                                                            @break

                                                        @default
                                                            <span class="badge bg-secondary">Indefinido</span>
                                                    @endswitch
                                                </td>
                                                
                                                <td class="d-flex flex-row gap-2">
                                                    @if ($reservation->status == 'canceled' || $reservation->status == 'confirmed' || $reservation->status == 'stand_by')                                                    
                                                        @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar', 'grupo.editar']))                                                        
                                                            <button data-bs-toggle="modal" data-bs-target="#reservation-view-{{$reservation->id}}" class="tabledit-edit-button btn btn-primary text-black" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-eye"></span></button>
                                                        @endif
                                                        <div class="modal fade" id="reservation-view-{{$reservation->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" style="max-width: 760px">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-light">
                                                                        <h4 class="modal-title" id="myCenterModalLabel">Reserva</h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body p-2 px-3 px-md-4">
                                                                        <form action="{{ route('admin.dashboard.reservation.update', ['reservation' => $reservation->id]) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            @include('admin.blades.reservation.form')   
                                                                            
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                   @endif
                                                   @if (!$reservation->status == 'canceled' || $reservation->status == 'confirmed' || $reservation->status == 'stand_by')  
                                                        <form action="{{route('admin.dashboard.reservation.confirmed',['reservation' => $reservation->id])}}" style="width: 30px" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            @if($reservation->status == 'confirmed')
                                                                <button type="button" 
                                                                        style="width: 30px"
                                                                        class="demo-delete-row btn btn-secondary btn-xs btn-icon"
                                                                        disabled
                                                                        title="Limite atingido para este horário e local">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            @else
                                                                {{-- Botão normal --}}
                                                                <button type="submit" 
                                                                        style="width: 30px"
                                                                        class="demo-delete-row btn btn-success btn-xs btn-icon">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            @endif
                                                        </form>
                                                        @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar', 'grupo.remover']))                                                        
                                                            <form action="{{route('admin.dashboard.reservation.canceled',['reservation' => $reservation->id])}}" style="width: 30px" method="POST">
                                                                @method('put') @csrf        
                                                                
                                                                <button type="submit" style="width: 30px"class="demo-delete-row btn btn-danger btn-xs btn-icon"><i class="fa fa-times"></i></button>
                                                            </form>
                                                        @endif
                                                   @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll("[id^='btnReagendar-']").forEach(button => {

        button.addEventListener("click", function () {

            const id = this.id.replace("btnReagendar-", "");

            const dateField = document.getElementById("inputDate-" + id);
            const btnSalvar = document.getElementById("btnSalvarReagendamento-" + id);

            if (!dateField || !btnSalvar) return;

            // ✔ Habilitar edição da data
            dateField.removeAttribute("readonly");

            // ✔ DAR FOCUS IMEDIATAMENTE
            setTimeout(() => dateField.focus(), 10);

            // ✔ Mostrar botão salvar
            btnSalvar.classList.remove("d-none");

            // ✔ Esconder botão reagendar
            this.classList.add("d-none");
        });
    });

});

document.addEventListener("DOMContentLoaded", () => {
    const dateInput = document.getElementById("date");
    const hoursSelect = document.getElementById("filterHours");

    function toggleHours() {
        if (dateInput.value) {
            hoursSelect.removeAttribute("disabled");

            // Se a opção de placeholder ainda existir, troca por "Todos"
            if (hoursSelect.options[0].text === "Selecione a data primeiro") {
                hoursSelect.options[0].text = "Todos";
            }
        } else {
            hoursSelect.setAttribute("disabled", true);
            hoursSelect.value = "";
            hoursSelect.options[0].text = "Selecione a data primeiro";
        }
    }

    dateInput.addEventListener("change", toggleHours);

    // Executa na carga inicial (ex: quando voltando de um filtro)
    toggleHours();
});
</script>

@endsection
