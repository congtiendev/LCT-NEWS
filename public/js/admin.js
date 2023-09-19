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

    /*----------------------------------------Confirm delete posts---------------------------*/
    $(".delete__post-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const url = API_URL + "post/delete/" + id;
        Swal.fire({
            title: "Bạn có chắc muốn xóa bài viết này?",
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
                            text: "Bài viết đã được xóa.",
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                return window.location.reload();
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

    /*----------------------------------------Accept post-----------------------------*/
    $(".accept__post-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const url = API_URL + "post/accept/";
        const rejectUrl = API_URL + "post/reject/";
        const acceptBtn = $(`.accept-${id}`);
        $.ajax({
            url: url,
            type: "PUT",
            data: {
                id: id,
            },
            success: function (response) {
                Swal.fire({
                    title: "Đã duyệt!",
                    text: "Bài viết đã được duyệt.",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`.reject-${id}`).remove();
                        $(`.status-${id}`).html(
                            `<a data-id="${id}"  href="${rejectUrl}" class="inline-flex px-3 py-1 text-xs font-medium rounded-full reject__post-btn bg-success bg-opacity-10 text-success">Đã duyệt</a>`
                        );
                    }
                });
                console.log(response.message);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });

    /*----------------------------------------Reject post-----------------------------*/
    $(".reject__post-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const url = API_URL + "post/reject/";
        const acceptUrl = API_URL + "post/accept/";
        const rejectBtn = $(`.reject-${id}`);
        $.ajax({
            url: url,
            type: "PUT",
            data: {
                id: id,
            },
            success: function (response) {
                Swal.fire({
                    title: "Đã từ chối!",
                    text: "Bài viết đã được từ chối.",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`.accept-${id}`).remove();
                        $(`.status-${id}`).html(
                            `<a data-id="${id}"  href="${acceptUrl}" class="inline-flex px-3 py-1 text-xs font-medium rounded-full accept__post-btn bg-danger bg-opacity-10 text-danger">Đã từ chối</a>`
                        );
                    }
                });
                console.log(response.message);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });

    /*----------------------------------------Delete banner-----------------------------*/
    $(".delete__banner-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const url = API_URL + "banner/delete/" + id;
        const bannerComponent = $(`#banner-${id}`);
        Swal.fire({
            title: "Bạn có chắc muốn xóa banner này?",
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
                            text: "Banner đã được xóa.",
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                bannerComponent.remove();
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

    /*----------------------------------------Kích hoạt banner-----------------------------*/

    $(".active__banner-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const url = API_URL + "banner/active";
        $.ajax({
            url: url,
            type: "PUT",
            data: {
                id: id,
            },
            success: function (response) {
                Swal.fire({
                    title: "Đã kích hoạt!",
                    text: "Banner đã được kích hoạt.",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
                console.log(response.message);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });

    /*----------------------------------------Tắt banner-----------------------------*/
    $(".deactive__banner-btn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        const url = API_URL + "banner/deactive";
        $.ajax({
            url: url,
            type: "PUT",
            data: {
                id: id,
            },
            success: function (response) {
                Swal.fire({
                    title: "Đã tắt!",
                    text: "Banner đã được tắt.",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
                console.log(response.message);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });
});
