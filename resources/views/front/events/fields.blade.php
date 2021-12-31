<div class="row">
    <div class="form-group col-sm-3">
        <label for="slug" class="col-sm-12 col-form-label">Slug</label>
        <div class="col-sm-12">
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
        </div>
    </div>
    {{-- <div class="form-group col-sm-4">
        <label for="name" class="col-sm-12 col-form-label">Nombre</label>
        <div class="col-sm-12">
            {!! Form::text('description[name]', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
        </div>
    </div> --}}
    <div class="form-group col-sm-3">
        <label for="language" class="col-sm-12 col-form-label">Categoria</label>
        <div class="col-sm-12">
            <select class="form-control" style="width: 100%;" name="categoryId" id="categoryId"></select>
        </div>
    </div>
    {{-- <div class="form-group col-sm-4">
        <label for="language" class="col-sm-12 col-form-label">Lenguaje</label>
        <div class="col-sm-12">
            <select class="form-control" style="width: 100%;" name="description[language]" id="language"></select>
        </div>
    </div> --}}
    <div class="form-group col-sm-3">
        <label for="name" class="col-sm-12 col-form-label">Capacidad</label>
        <div class="col-sm-12">
            {!! Form::number('capacity', null, ['class' => 'form-control', 'placeholder' => 'Capacidad', 'min' => 0]) !!}
        </div>
    </div>
    <div class="form-group col-sm-3">
        <label for="name" class="col-sm-12 col-form-label">Fecha</label>
        <div class="col-sm-12">
            <div class="input-group date" data-provide="datepicker">
                {{-- <input type="text" class="form-control"> --}}
                {!! Form::text('date', null, ['class' => 'form-control', 'id' => 'date']) !!}
                <div class="input-group-addon col-sm-2">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-left: 0px;" class="form-group col-sm-8">
        @include('front.repeteable',['value' => $event->description])
    </div>

    <div style="margin-top: 40px;" class="form-group col-12">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
    </div>

    <input type="hidden" name="languageLocal" id="languageLocal" value="{{ $language }}" />
    <input type="hidden" name="dateEvent" id="dateEvent" value="{{ $event->date }}" />
    <input type="hidden" name="category_id" id="category_id" value="{{ $event->categoryId }}" />

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
                        language: $('#languageLocal').val()
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
                                id: item.categoryId
                            }
                        })
                    };
                },
                cache: true
            }
        });

        if ($('#dateEvent').val() != "") {
            $('#date').val('');
            let dateEvent = new Date($('#dateEvent').val());
            let dateFormat = (dateEvent.getMonth() + 1) + '/' + dateEvent.getDate().toString() + '/' + dateEvent
                .getFullYear().toString();
            $('#date').val(dateFormat);
            $('#date').data({
                date: dateFormat
            });
            $('#date').datepicker('update');
            $('#date').datepicker().children('input').val(dateFormat);

        } else {
            $('.datepicker').datepicker({
                language: 'es',

            });
        }

        $(document).ready(function() {

            if ($('#category_id').val() != "") {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo url('/'); ?>' + '/get-categories?language='+$('#languageLocal').val(),
                    dataType: 'json',
                }).then(function(dataSelect) {
                    let selected = "";
                    for (let i = 0; i < dataSelect.length; i++) {
                        console.log($('#category_id').val())
                        if (dataSelect[i].categoryId == $('#category_id').val()) {
                            selected = dataSelect[i];
                        }
                    }
                    let option = new Option(selected.name, selected.categoryId, false, false);
                    $('#categoryId').append(option).trigger('change');
                });
            }

        });
    </script>
@endpush
