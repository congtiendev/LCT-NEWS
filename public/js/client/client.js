const ADMIN_URL = "http://127.0.0.1:8000/admin/";
const CLIENT_URL = "http://127.0.0.1:8000/";
const MEDIA_URL = CLIENT_URL + "storage/";
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // ----------------------New comment----------------------
    $(".new__comment-btn").click(function (e) {
        e.preventDefault();
        const post_id = $(this).data("post-id");
        const user_id = $(this).data("user-id");
        const content = $(`#comment__content-${post_id}`).val();
        const auth_url = CLIENT_URL + "auth/" + user_id;
        const url = CLIENT_URL + "comment/new";
        const data = {
            post_id: post_id,
            user_id: user_id,
            content: content,
        };
        console.log(data);
        const listComment = $(`#list__comment-${post_id}`);
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                window.location.reload();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    var swiper = new Swiper(".bannerSwiper", {
      scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
      },
    });
});
