<?php
$descriptionOld ="";
if(!empty(old('json_description'))){
    $descriptionOld = old('json_description');
    $category->description = json_decode($descriptionOld);
}

?>

<div class="row">
    <div class="form-group col-sm-4">
        <label for="slug" class="col-sm-12 col-form-label">Slug</label>
        <div class="col-sm-12">
            {{-- <input type="text" class="form-control" id="slug" name="slug" placeholder=""> --}}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
            <span class="text-danger" id="messageslug"></span>
        </div>
    </div>
    <div class="form-group col-sm-8">
    @include('front.repeteable',['value' => $category->description])
    </div>
    <div style="margin-top: 30px;" class="form-group col-12">
        <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Guardar</button>
    </div>
</div>

@push('scripts')

@endpush