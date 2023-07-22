const API_URL = "http://127.0.0.1:8000/admin/";
$(document).ready(function () {
    //Set up ajax header for laravel csrf token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    /*----------------------------------------Confirm delete user---------------------------*/

    $(".delete__user-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const userComponent = $(`#user-${id}`);
        const url = API_URL + "user/delete/" + id;
        Swal.fire({
            title: "Bạn có chắc muốn xóa tài khoản này?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Xóa",
            cancelButtonText: "Hủy",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "DELETE",
                    success: function (response) {
                        Swal.fire({
                            title: "Đã xóa!",
                            text: "Tài khoản đã được xóa.",
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                userComponent.remove();
                            }
                        });
                        console.log(response.message);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    },
                });
            }
        });
    });

    /*----------------------------------------Restore user---------------------------*/
    $(".restore__user-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const userComponent = $(`#user-${id}`);
        const url = API_URL + "user/restore/" + id;
        $.ajax({
            url: url,
            type: "PUT",
            success: function (response) {
                Swal.fire({
                    title: "Đã khôi phục!",
                    text: "Tài khoản đã được khôi phục.",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        userComponent.remove();
                    }
                });
                console.log(response.message);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });

    /*----------------------------------------force delete user---------------------------*/
    $(".force__delete-user-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const userComponent = $(`#user-${id}`);
        const url = API_URL + "user/force-delete/" + id;
        Swal.fire({
            title: "Bạn có chắc muốn xóa tài khoản này?",
            text: "Tài khoản này sẽ không thể khôi phục lại!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Xóa",
            cancelButtonText: "Hủy",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        Swal.fire({
                            title: "Đã xóa!",
                            text: "Tài khoản đã được xóa.",
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                userComponent.remove();
                            }
                        });
                        console.log(response.message);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    },
                });
            }
        });
    });
});
