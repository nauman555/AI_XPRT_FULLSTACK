var baseurl = $('meta[name=app-url]').attr("content");
// set customer id when placing order via model
$(document).on("click", ".set-place-order-details", function() {


    var customernumber = $(this).data('customernumber');

    console.log(customernumber);
    $('#customernumber').val(customernumber);

});


// on place order



$(document).on('submit', '#place_order_form', function(e) {


    var customernumber = $('#customernumber').val();
    var requiredDate = $('#requiredDate').val();
    var orderDate = $('#orderDate').val();
    var shippedDate = $('#shippedDate').val();
    var price = $('#price').val();
    var status = $('#status').val();
    var comments = $('#comments').val();
    var product = $('#product').val();
    var qurantity = $('#qurantity').val();

    var dataString = 'customernumber=' + customernumber + '&orderDate=' + orderDate + '&requiredDate=' + requiredDate + '&shippedDate=' +
        shippedDate + '&price=' + price + '&status=' + status + '&comments=' + comments + '&product=' + product + '&qurantity=' + qurantity;

    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/place/order',
        data: dataString,
        success: function(data) {
            console.log(data);
            if (data.status == 1) {
                swal("Success", "Order Placed Successfully!", "success");
                document.getElementById('place_order_form').reset();
                setTimeout(function() {
                    window.location.href = '/';
                }, 2000);

            } else {
                swal("Error", "Try Again!", "error");
            }
        }
    });
    return false;
});