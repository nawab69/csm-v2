function calculateFee(currency){

    let to_address = $("#address").val();
    let amount = $("#amount").val();
    let uid = $("#uid").val();

    $.post( `/api/${currency}/calculate`, { to_address , amount, uid })
        .done(function( data ) {
            if(data.status == 'success'){
                let fee = parseFloat(data.data.estimated_network_fee);
                let blockio_fee = parseFloat(data.data.blockio_fee);
                $("#fee").text((fee+blockio_fee));
                $("#total").text((fee+blockio_fee+parseFloat(amount)));
                $("#calculate").hide();
                $("#send").show();
                $("#status").show();
                $("#error_message").text('');
                $('#amount').prop('readonly', true);
                $('#address').prop('readonly', true);
                $("#message").hide();
            }
            else if(data.status == 'fail'){
                $('#error_message').text('Insufficient Balance or invalid recipient address');
                $("#status").hide();
                $("#message").show();
                $("#send").hide();
            }
        });
}

function calculateMax(currency){
    let to_address = $("#address").val();
    let uid = $("#uid").val();

    if(to_address.length < 10){
        alert('Please Fill the recipient address first');
    }

    $.post( `/api/${currency}/max`, { to_address , uid })
        .done(function( data ) {
            if(data.data.max_withdrawal_available){
                console.table(data.data);
                $('#amount').val(data.data.max_withdrawal_available);
                calculateFee(currency);
            }else{
                $("#send").hide();
                alert('Please Insert correct Address and Try again . ');
            }

        });
}
