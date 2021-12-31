<div style="top: 20%;" id="modalEvent" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div style="border: 1px solid #e5b250!important;border-radius: 10px;" class="modal-content">
            <div style="border: 0px;" class="modal-header">
                <h2 class="modal-title" style="text-align: center;float: left;
        width: 100%;color: #e5b250;" id="modalEventLabel">Compra las entradas</h2>
                <button id="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/event-assistants', 'id' => 'assistants', 'class' => 'form-horizontal']) !!}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="registerEmail" class="col-sm-12 col-form-label">Correo</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="email@example.com">
                            <span class="text-danger" id="messageemail"></span>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="quantity" class="col-sm-12 col-form-label">Cantidad</label>
                        <div class="col-sm-12">
                            <input data-submit="submitButton" type="text" class="form-control enterkey"
                                name="quantity" id="quantity" placeholder="0">
                            <span class="text-danger" id="messagequantity"></span>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div style="text-align: center;float: left; display: block;
      border:0px;width: 100%;" class="modal-footer">
                <a style="background: #e5b250!important;border: 1px solid #3d2c19!important;"
                    onclick="submitForm('assistants','/event-assistants')" id="submitButton"
                    class="btn btn-primary submitButton">Guardar</a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function openModal(eventID) {
            $('#eventID').remove();
            let domHtml =
                '<input type="hidden" name="eventID" id="eventID" value="'+eventID+'" class="form-control" />';
            $('.modal-body .row').append(domHtml);
        }
    </script>

@endpush
