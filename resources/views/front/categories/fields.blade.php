<div class="row">
    <div class="form-group col-sm-4">
        <label for="slug" class="col-sm-12 col-form-label">Slug</label>
        <div class="col-sm-12">
            {{-- <input type="text" class="form-control" id="slug" name="slug" placeholder=""> --}}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
            <span class="text-danger" id="messageslug"></span>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label for="name" class="col-sm-12 col-form-label">Nombre</label>
        <div class="col-sm-12">
            {{-- <input type="text" class="form-control" id="name" name="name" placeholder=""> --}}
            {!! Form::text('description[name]', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
            <span class="text-danger" id="messagename"></span>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label for="language" class="col-sm-12 col-form-label">Lenguaje</label>
        <div class="col-sm-12">
            <select class="form-control" style="width: 100%;" name="description[language]" id="language"></select>
        </div>
    </div>
    <div class="form-group col-12 text-center">
        <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Guardar</button>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    var securitytoken = $('meta[name=csrf-token]').attr('content');
    let select2 = "";

    select2 = $('#language').select2({
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
</script>
@endpush