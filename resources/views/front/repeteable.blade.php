@php
$field['value'] = $value;
@endphp
<?php if($field['value'] != null && count($field['value']) > 0) {?>
<input name="json_description" type="hidden" id="json_description" value="{{ json_encode($field['value']) }}" />
<?php }else{ ?>
<input name="json_description" type="hidden" id="json_description" value="[{{ json_encode($field['value']) }}]" />
<?php } ?>
<div style="float: left;width: 100%;" id="container_inputs">

</div>
<div style="float: left;width: 100%;margin-top: 20px;text-align: center;">
    <a href="javascript:" onclick="addRow();">Agregar otra Descripción</a>
</div>

@push('scripts')

    <script>
        let data = JSON.parse($('#json_description').val());
        let domHtml = "";
        let index = 0;
        data.forEach(function(element) {
            domHtml += generateInputText(element);
            domHtml += generateSelect(index);
            domHtml += deleteButton();
            index = index + 1;
        });
        $('#container_inputs').html(domHtml);

        index = 0;
        data.forEach(function(element) {
            listenerSelectLanguage(index);
            selectedValue(element,index);
            index = index + 1;
        });

        rebuilJson();

        function generateInputText(element = "") {
            if (element != "") {
                return '<div style="clear:left;" class="form-group col-sm-6"><label for="name" class="col-sm-12 col-form-label">Nombre</label><div class="col-sm-12">' +
                    '<input type="text" name="name" id="description.name" value="' +
                    element.name + '" class="form-control valueInput" />' + '</div></div>';
            } else {
                return '<div style="clear:left;" class="form-group col-sm-6"><label for="name" class="col-sm-12 col-form-label">Nombre</label><div class="col-sm-12">' +
                    '<input type="text" name="name" id="description.name" class="form-control valueInput" /></div></div>';
            }

        }

        function generateSelect(index) {
            return '<div class="form-group col-sm-5"><label for="language" class="col-sm-12 col-form-label">Lenguaje</label>' +
                '<div class="col-sm-12"><select class="form-control valueInput" style="width: 100%;" name="language" id="language' +
                index + '"></select>' +
                '</div></div>';
        }

        function deleteButton() {
            return '<div style="margin-bottom: 0px;margin-top:30px;" class="form-group col-sm-1"><a onclick="deleteRow(this);" href="javascript:"><i class="fas fa-times"></i></a></div>';
        }

        function addRow() {
            let domHtml = "";
            domHtml += generateInputText();
            domHtml += generateSelect($("#container_inputs select").length);
            domHtml += deleteButton();
            $('#container_inputs').append(domHtml);
            enabledListener();
            listenerSelectLanguage($("#container_inputs select").length - 1);
        }

        function deleteRow(event) {
            let button = $(event).parent();
            let select = $(event).parent().prev();
            let input = $(event).parent().prev().prev();
            button.remove();
            select.remove();
            input.remove();
            enabledListener();
            rebuilJson();
        }

        function enabledListener() {
            $("#container_inputs select").change(function() {
                rebuilJson();
            });
            $("#container_inputs input").keyup(function() {
                rebuilJson();
            });

        }

        function rebuilJson() {
            let domContainer = document.getElementById("container_inputs");
            let data = [];
            let index = 0;
            let element = {};
            for (var i = 0, max = domContainer.children.length; i < max; i++) {
                index = i % 3;
                if (index == 2) {
                    data.push(element)
                    element = {};
                }

                if (domContainer.children[i].querySelector('.valueInput') != null) {
                    element[domContainer.children[i].querySelector('.valueInput').attributes["name"].value] =
                        domContainer.children[i].querySelector('.valueInput').value;
                }
            }
            $("#json_description").val(JSON.stringify(data));
        }

        function listenerSelectLanguage(id) {
            let select2 = "";
            select2 = $('#language' + id).select2({
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
        }

        function selectedValue(item,index) {
            $.ajax({
                type: 'GET',
                url: '<?php echo url('/'); ?>' + '/get-languages',
                dataType: 'json',
            }).then(function(dataSelect) {
                let selected ="";
                // let selected = dataSelect.filter((item) => item.code == item.language);
                for(let i=0;i < dataSelect.length; i++){
                    if(dataSelect[i].code == item.language){
                        selected = dataSelect[i];
                    }
                }
                let option = new Option(selected.name, selected.code, false, false);
                $('#language' + index).append(option).trigger('change');
            });
        }

        $(document).ready(function() {
            enabledListener();
        });
    </script>
@endpush
