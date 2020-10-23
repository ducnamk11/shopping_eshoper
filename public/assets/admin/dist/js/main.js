$(document).ready(function () {

    //ADD CART
    $(function () {
        $('.confirm_select').on('change', changeConfirm);

    });

    function changeConfirm(event) {
        event.preventDefault();
        let url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                location.reload();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Changed Confirm of Order!',
                    showConfirmButton: false,
                    timer: 3000
                });

            }
        });
    }
})