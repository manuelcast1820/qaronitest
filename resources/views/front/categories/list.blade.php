@extends('layouts.header')
@section('content')

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-align: center;margin-bottom: 60px;">Categorias <a
                            href="{{ url('/categories/create') }}"><i class="fas fa-plus-circle"></i> Nueva Categoria</a>
                    </h2>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Slug</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Idioma</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <th style="font-weight: normal;">{{ $item->category->slug }}</th>
                                    <th>{{ $item->name }}</th>
                                    <th>{{ App\Models\Language::where('code', $item->language)->first()->name }}
                                    </th>

                                    <th>
                                        <p><a href="{{ url('/categories/' . $item->categoryId . '/edit') }}"><i class="fas fa-edit"></i></a>
                                            <a style="margin-left:5%;" href="javascript:"
                                                onclick="deleteItem('{{ $item->categoryId }}');"><i class="fas fa-trash"></i></a>
                                        </p>
                                        
                                    </th>

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

            function deleteItem(id) {
                var securitytoken = $('meta[name=csrf-token]').attr('content');
                Swal.fire({
                    title: '¿Estas seguro que deseas eliminar?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar <i class="fa fa-thumbs-up"></i>',
                    cancelButtonText: 'Cancelar <i class="fa fa-thumbs-down"></i>',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            cache: false,
                            type: 'DELETE',
                            url: '<?php echo url('/') ?>'+'/categories/' + id,
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
