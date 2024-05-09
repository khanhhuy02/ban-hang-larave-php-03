$(document).ready(function () {
    $('.add-to-cart').click(function (e) {
        e.preventDefault();
        var products_id = $(this).closest('.product_data').find('.products_id').val();
        var quantity = $(this).closest('.product_data').find('.quantity').val();
        var price_new = $(this).closest('.product_data').find('.price_new').val();

        var scrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': scrfToken
            }
        });


        $.ajax({
            method: "post",
            url: "{{route('addTocart')}}",
            data: {
                'products_id': products_id,
                'quantity': quantity,
                'price_new': price_new,
            },

            success: function (responsive) {
                alert(responsive.status)
            },
            error: function (responsive) {
                alert(responsive.status)

            }
        })

    })

})