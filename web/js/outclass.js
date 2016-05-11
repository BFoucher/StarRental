
$('#check_outclass_btn').on('click',checkOutclass)

function checkOutclass(e){
    e.preventDefault();
    var response_area = $('#outclass_response');
    var customer = $('#booking_customer').val();
    var ship = $('#booking_ship').val();

    if (ship == '' || customer == ''){
        response_area.html('Please select Ship and Customer');
        return false;
    }
    $.ajax({
            method: "POST",
            url: "/outclass/",
            data: {ship: ship, customer: customer}
        })
        .done(function( data ) {
            response_area.html( data.msg);
            if (data.outclass == true){
                response_area.append('<input type="checkbox" id="outclass_checkbox">');
                $('#outclass_checkbox').on('click',outclassTrue);
            }
        });
}

function outclassTrue(){
    console.log(this);
    if (this.checked){
        $('#booking_outclassed').val(1);
    }else{
        $('#booking_outclassed').val(0);
    }

}