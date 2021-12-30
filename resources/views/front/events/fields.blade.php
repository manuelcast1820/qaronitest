<div class="row">
    <div class="form-group col-sm-4">
        <label for="slug" class="col-sm-12 col-form-label">Slug</label>
        <div class="col-sm-12">
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label for="name" class="col-sm-12 col-form-label">Nombre</label>
        <div class="col-sm-12">
            {!! Form::text('description[name]', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label for="language" class="col-sm-12 col-form-label">Categoria</label>
        <div class="col-sm-12">
            <select class="form-control" style="width: 100%;" name="categoryId" id="categoryId"></select>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label for="language" class="col-sm-12 col-form-label">Lenguaje</label>
        <div class="col-sm-12">
            <select class="form-control" style="width: 100%;" name="description[language]" id="language"></select>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label for="name" class="col-sm-12 col-form-label">Capacidad</label>
        <div class="col-sm-12">
            {!! Form::number('capacity', null, ['class' => 'form-control', 'placeholder' => 'Capacidad', 'min' => 0]) !!}
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label for="name" class="col-sm-12 col-form-label">Fecha</label>
        <div class="col-sm-12">
            <div class="input-group date" data-provide="datepicker">
                {{-- <input type="text" class="form-control"> --}}
                {!! Form::text('date', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon col-sm-2">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-12 text-center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
    </div>


</div>

@push('scripts')
    <script type="text/javascript">
        var securitytoken = $('meta[name=csrf-token]').attr('content');
        let select2 = "";

        select2 = $('#categoryId').select2({
            placeholder: 'Seleccione una categoria',
            allowClear: true,
            ajax: {
                url: '<?php echo url('/'); ?>' + '/get-categories',
                data: function(params) {
                    var query = {
                        search: params.term,
                    }
                    return query;
                },
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            var doc = new DOMParser().parseFromString(item.name, "text/xml");
                            return {
                                text: item.description.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        let select2Lang = "";

        select2Lang = $('#language').select2({
            placeholder: 'Seleccione un idioma',
            allowClear: true,
            ajax: {
                url: '<?php echo url('/'); ?>' + '/get-languages',
                data: function(params) {
                    var query = {
                        search: params.term,
                    }
                    return query;
                },
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            var doc = new DOMParser().parseFromString(item.name, "text/xml");
                            return {
                                text: item.name,
                                id: item.code
                            }
                        })
                    };
                },
                cache: true
            }
        });


        $('.datepicker').datepicker({
            language: 'es'
        });
    </script>
@endpush
