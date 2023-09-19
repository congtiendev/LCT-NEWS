/* ----------------------------------------Editor--------------------------- */
const editor_config = {
    width: "100%",
    height: "500px",
    path_absolute: "/",
    selector: "textarea#content__post",
    relative_urls: false,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern",
    ],
    toolbar:
        "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback: function (callback, value, meta) {
        var x =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.getElementsByTagName("main")[0].clientWidth;
        var y =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.getElementsByTagName("main")[0].clientHeight;

        var cmsURL =
            editor_config.path_absolute +
            "laravel-filemanager?editor=" +
            meta.fieldname;
        if (meta.filetype === "image") {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL,
            title: "Filemanager",
            width: 700,
            height: y * 0.8,
            zindex: 999999999,
            resizable: "yes",
            close_previous: "no",
            onMessage: (api, message) => {
                callback(message.content);
            },
        });
    },
};
tinymce.init(editor_config);

/* ----------------------------------------Preview Image--------------------------- */
$(function () {
    function readURL(input, selector) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(selector).attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#avatar-upload").change(function () {
        readURL(this, "#avatar");
    });
    $("#thumbnail-upload").change(function () {
        readURL(this, "#thumbnail");
    });
    $("#banner-upload").change(function () {
        readURL(this, "#banner");
    });
});
