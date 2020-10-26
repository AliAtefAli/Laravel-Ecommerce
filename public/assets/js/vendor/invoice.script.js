$(document).ready(function(){
    $('#order-datepicker').pickadate();
    $('.print-invoice').on('click', function() {
        $('.print-invoice').hide();
        window.print();
    })
});
