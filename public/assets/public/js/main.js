/*price range*/

if ($.fn.slider) {
    $('#sl2').slider();
}

var RGBChange = function () {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});


$(document).ready(function () {

    //ADD CART
    $(function () {
        $('.add-cart').on('click', addToCart);

    });

    function addToCart(event) {

        event.preventDefault();
        let url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Add a product to Cart',
                    showConfirmButton: false,
                    timer: 1500
                });
                location.reload();
            }
        });
    }

    //DELETTE

    $(function () {
        $('.cart_quantity_delete').on('click', deleteFromCart);
    });

    function deleteFromCart(event) {
        event.preventDefault();
        let url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Deleted product from Cart',
                    showConfirmButton: false,
                    timer: 1500
                });
                location.reload();
            }
        });
    }
    //Update

    $(function () {
        $('.cart_quantity_input, input[type=number]').on('change', updateCart); //'.quantity, input[type=number]'
    });

    function updateCart(qty) {

        let url = $(this).data('url');
        var qty = $(this).val();

        $.ajax({
            type: 'GET',
            url: url,
            data: { qty: qty },
            success: function (data) {
                location.reload();
            }
        });
    }

    //DELETTE all cart

    $(function () {
        $('#cart_all_delete').on('click', deleteAllCart);
    });

    function deleteAllCart(event) {
        event.preventDefault();
        let url = $(this).data('url');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-3',
                cancelButton: 'btn btn-danger m-3'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure delete Cart?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        location.reload();
                    }
                });
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
});


