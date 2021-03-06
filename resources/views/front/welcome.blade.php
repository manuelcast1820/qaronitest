@extends('layouts.header')
@section('content')

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-align: center;">Eventos <a
                            href="{{ url('/events/create?language=' . session('lang')) }}"><i
                                class="fas fa-plus-circle"></i>
                            Nuevo Evento</a></h2>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Slug</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $item)
                                <tr>
                                    <th>{{ $item->event->slug }}</th>
                                    <th>{{ $item->name }}</th>
                                    <th>{{ \Carbon\Carbon::parse($item->event->date)->format('j F, Y') }}</th>
                                    <th>{{ $item->event->capacity }}</th>
                                    <th>
                                        <p>
                                            <a
                                                href="{{ url('/events/' . $item->eventId . '/edit?language=' . session('lang')) }}"><i class="fas fa-edit"></i></a>
                                            <a style="margin-left:5%;" href="javascript:"
                                                onclick="deleteItem('{{ $item->eventId }}');"><i
                                                    class="fas fa-trash"></i></a>
                                        </p>
                                        <p><button type="button" class="btn btn-primary"
                                                onclick="openModal('{{ $item->eventId }}');" data-toggle="modal"
                                                data-target="#modalEvent"
                                                data-route="{{ url('/events/' . $item->eventId) }}" href="#">Comprar
                                                Entrada</button>
                                        </p>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    @include('front.events.modal')
    <div style="position: absolute;left:48%;top: 50%;z-index: 10000;display: none;" id="spinnerLoading"
        style="display: none;" class="spinner-border" role="status">
        <span class="sr-only">Por favor espere...</span>
    </div>
    <input type="hidden" value="{{ url('/') }}" id="baseUrl" />

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#table').DataTable({
                    columnDefs: [{
                        width: 200,
                        targets: 1
                    }],
                    <?php if(session('lang') == "es"){  ?> "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    }
                    <?php } ?>
                });
            });

            function deleteItem(id) {
                var securitytoken = $('meta[name=csrf-token]').attr('content');
                Swal.fire({
                    title: '??Estas seguro que deseas eliminar?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar <i class="fa fa-thumbs-up"></i>',
                    cancelButtonText: 'Cancelar <i class="fa fa-thumbs-down"></i>',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            cache: false,
                            type: 'DELETE',
                            url: '<?php echo url('/') ?>'+'/events/' + id,
                            data: {
                                id: id,
                                _token: securitytoken
                            },
                            success: function(data) {
                                Swal.fire('Eliminado!', '', 'success');
                                location.reload();
                            },
                            error: function() {
                           
                            }
                        });
                        
                    }
                })
            }
        </script>
    @endpush

@endsection
