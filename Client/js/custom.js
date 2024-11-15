$(document).ready(function () {
    $('.all-products').on('click', function (e) {
        e.preventDefault();
        alert("all");
    });

    $('.vegetables').on('click', function () {
        alert("vegetables!");
    });

    $('.fruits').on('click', function () {
        alert("fruits!");
    });

    $('.breads').on('click', function () {
        alert("breads!");
    });

    $('.meats').on('click', function () {
        alert("meats!");
    });

    $('.remove-item').on('click', function () {
        alert("Remove Item!");
    });


});
