
$(document).ready(function() {
    $('.add-to-cart').click(function(e) {
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

            success: function(responsive) {
                alert(responsive.status)
            },
            error: function(responsive) {
                alert(responsive.status)

            }
        })

    })
    $('.tt').click(function(e) {
        e.preventDefault();
        var $button = $(this);
        var products_id = $button.closest('.product_data').find('.products_id').val();
        var quantity = $button.closest('.product_data').find('.quantity').val();
        var price_new = $button.closest('.product_data').find('.price_news').val();



        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });


        $.ajax({
            method: "post",
            url: "cap-nhat-so-luong-tang/" + products_id,
            data: {
                'products_id': products_id,
                'quantity': quantity,
                'price_new': price_new,
            },

            success: function(responsive) {
                var newQuantity = response.quantity;
                var priceNew = response.price_new;

                // Cập nhật số lượng hiển thị trên trang
                $button.closest('.product_data').find('.quantity').text(newQuantity);


                // Cập nhật giá hiển thị trên trang
                $button.closest('.product_data').find('.total').text(priceNew);
            },
            error: function(responsive) {


            }
        })

    })


    //  điền số 
    $('.quantity').keyup(function(e) {
        e.preventDefault();
        var products_id = $(this).closest('.product_data').find('.products_id').val();
        var quantity = $(this).closest('.product_data').find('.quantity').val();
        var price_new = $(this).closest('.product_data').find('.price_news').val();


        var quantitys = 0;

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        if (quantity <= 1) {
            quantity = 1;

            quantitys = quantity
            $.ajax({
                method: "post",
                url: "cap-nhat-so-luong-tang/" + products_id,
                data: {
                    'products_id': products_id,
                    'quantity': quantitys,
                    'price_new': price_new,
                },

                success: function(responsive) {
                       window.location.reload();
                },
                error: function(responsive) {


                }
            })
        } else {

            $.ajax({
                method: "post",
                url: "cap-nhat-so-luong-tang/" + products_id,
                data: {
                    'products_id': products_id,
                    'quantity': quantity,
                    'price_new': price_new,
                },

                success: function(responsive) {
                    window.location.reload();
                },
                error: function(responsive) {


                }
            })
        }

    })

    // phiếu giảm giá 
    $('.clickcoupons').click(function(e) {

        e.preventDefault();
        var code = $(this).closest('.product_data').find('.coupons').val(); 



        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            method: "post",
            url: "{{route('cartCoupons')}}",
            data: {
                'code': code,
            },

            success: function(responsive) {
                alert(responsive.status)
                window.location.reload();
                
            },
            error: function(responsive) {


            }
        })


    })



    $('.delete-to-cart').click(function(e) {
        e.preventDefault();
        var products_id = $(this).closest('.product_data').find('.products_id').val();

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            method: "delete",
            url: "delete-cart/" + products_id, // Đường dẫn URL sẽ bao gồm productId
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {
                console.log(response);
            }
        });
    });



})