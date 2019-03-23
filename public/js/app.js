
// Get all inputs

const from =  $('#from');
const to =  $('#to');
const amount =  $('#amount');
const converted = $('#converted');
const data =  $('#dataType:checked');

// On Convert button click

$(".btn").click(function(){

    // Simple validation to check only a number can be entered.

    if($.isNumeric(amount.val())) {

        amount.removeClass('error');

        // Create the request URL parameter's from input values.

        let url = '/api/currency?from=' + from.val() + '&to=' + to.val() + '&amount='+ amount.val() + '&data=' + data.val();

        // Submit form via ajax, log errors and update converted value.

        $.ajax({
            type: 'GET',
            url: url,
            success:function(response){
                converted.val(response);
            },
            error:function(error){
                console.log(error);
            }
        })

    }

    // If non numeric show error and add error class.

    else {
        alert('Please only use numerical digits.');
        amount.addClass('error');
    }

});