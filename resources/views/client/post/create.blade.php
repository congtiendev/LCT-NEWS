{{-- <!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
<script src="https://cdn.tiny.cloud/1/nfspfiqg68gvchcx3d0u31hnatu1j7z64qtj0e7c8kqh6gs7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <div class="container mx-auto">
        <form method="post" action="{{ route('post.create') }}" enctype="multipart/form-data">
            @csrf
            <label>
                <textarea name="content" class="text-red-500">
</textarea>
            </label>
            <button type="submit" value="Submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>

    <script>
        const editor_config = {
            width: "100%"
            , height: "700px"
            , path_absolute: "/"
            , selector: 'textarea'
            , relative_urls: false
            , plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak"
                , "searchreplace wordcount visualblocks visualchars code fullscreen"
                , "insertdatetime media nonbreaking save table directionality"
                , "emoticons template paste textpattern"
            ]
            , toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
            , file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype === 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL
                    , title: 'Filemanager'
                    , width: x * 0.8
                    , height: y * 0.8
                    , resizable: "yes"
                    , close_previous: "no"
                    , onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };
        tinymce.init(editor_config);

    </script>
</body>
</html> --}}
