@extends('layouts.header')
@section('content')

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-align: center;">Eventos <a href="{{ url('/events/create') }}"><i
                                class="fas fa-plus-circle"></i> Nuevo Evento</a></h2>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Slug</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Capacidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $item)
                                <tr>
                                    <th>{{ $item->slug }}</th>
                                    <th>{{ $item->category->description->name }}</th>
                                    <th>{{ $item->date }}</th>
                                    <th>{{ $item->capacity }}</th>
                                    
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
    </section>

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
        </script>
    @endpush

@endsection
