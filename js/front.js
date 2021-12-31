var securitytoken = $("meta[name=csrf-token]").attr("content");

$(document).ready(function () {
    $(".activate-modal").click(function () {
        let form = $($(this).data("target")).find("form");
        form[0].reset();
        $($(this).data("target") + " .text-danger").text("");
    });

    $(".enterkey").keypress(function (e) {
        var code = e.keyCode || e.which;
        let triggerButton = $(this).data('submit');
        console.log(triggerButton)
        if (code === 13) {
            e.preventDefault();
            $('#'+triggerButton).trigger('click');
        }
    });
});

function submitForm(idForm, redirect,message="") {
    var form = $("#" + idForm);
    var url = form.attr("action");
    $("#spinnerLoading").css("display", "block");
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            if (data.success) {
                console.log(data.message)
                $("#spinnerLoading").css("display", "none");
                if(data.message != ""){
                    Swal.fire({
                        title: 'Exito!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                      })
                      $("#closeModal").trigger('click');
                }else{
                    window.location.replace($("#baseUrl").val() + redirect);
                }
                
            }else if(!data.success){
                $("#spinnerLoading").css("display", "none");
                Swal.fire({
                    title: 'Error!',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                  })
            }else{
                console.log(data)
            }
        },
        error: function (response) {
            let errors = response.responseJSON.errors;
            for (const [key, value] of Object.entries(errors)) {
                $("#message" + key).text(value[0]);
            }
            $("#spinnerLoading").css("display", "none");
        },
    });
}
