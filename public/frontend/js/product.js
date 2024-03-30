// add to cart
$(document).on("click", ".addToCartAjax", function () {
    // lay id
    let productId = $(this).attr("data-id");
    let url = "/addToCartAjax/" + productId;
    //add
    $.ajax({
        type: "GET",
        url: url,
        data: {},
        success: function (data) {
            // Ajax call completed successfully
            // $("#alertDiv").load(location.href + " #alertDiv>*", "")
            $("#alertDiv").fadeOut(500, function () {
                $("main").html(data).fadeIn();
            });
            setInterval(function () {
                $("#alertDiv").addClass("opacity-0");
                setInterval(function () {
                    $("#alertDiv").fadeOut();
                }, 3000)
            }, 3000);
        },
        error: function (data) {
            // Some error in ajax call
            alert("Error");
        },
    });
});

// ALERT
setInterval(function () {
    $(".alert").addClass("opacity-0");
    setInterval(function () {
        $(".alert").fadeOut();
    }, 1000);
}, 3000);
