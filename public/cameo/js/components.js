$(document).ready(function () {

    $('.sliders input').slider();
    $('#eg input').slider();
    $('#sl2').slider();

    $(document).on('click', '[data-toggle="toastr"]', function (e) {
        e.preventDefault();

        setTimeout(function () {
            toastr.options.closeButton = true;
            toastr.info('Your campaign has been approved!', 'System Notification');
        }, 500);
    });

    $("[data-toggle=tooltip]").tooltip("show");
    
    $("[data-toggle=popover]")
    .popover()
    .click(function (e) {
            e.preventDefault();
    });

});
