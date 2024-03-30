$(document).ready(function () {
    // ALERT
    setInterval(function () {
        $(".alert").addClass("opacity-0");
        setInterval(function () {
            $(".alert").fadeOut();
        }, 1000);
    }, 3500);

    // PASSWORD EYE
    $("#show_hide_password a").on("click", function (event) {
        event.preventDefault();
        if ($("#show_hide_password input").attr("type") == "text") {
            $("#show_hide_password input").attr("type", "password");
            $("#show_hide_password i").addClass("bi-eye-slash");
            $("#show_hide_password i").removeClass("bi-eye");
        } else if ($("#show_hide_password input").attr("type") == "password") {
            $("#show_hide_password input").attr("type", "text");
            $("#show_hide_password i").removeClass("bi-eye-slash");
            $("#show_hide_password i").addClass("bi-eye");
        }
    });

    // DELETE MODAL
    $(document).on("click", ".dlt-btn", function () {
        let id = $(this).attr("data-id");
        $("#id").val(id);
    });
    $(document).on("click", ".modalBtn", function () {
        let id = $(this).attr("data-id");
        $("#id").val(id);
    });

});
