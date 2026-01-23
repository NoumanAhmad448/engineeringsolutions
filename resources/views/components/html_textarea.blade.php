@props([
    'name', // name of the field
    'label' => '', // optional label
    'value' => '', // default value
])

@php
$class_name = $name . $label ? str_replace(' ', '_', $label) : "label";
@endphp
<div class="form-group">
    @if ($label)
        <label>{{ $label }}</label>
    @endif

    <textarea id="{{ $name }}" name="{{ $name }}" class="form-control {{ $class_name }}" rows="5">
        {!! old($name, $value) !!}
    </textarea>
</div>

<script>
    $(document).ready(function() {
        $('.{{ $class_name }}').summernote({
            // width: 100,{
            height: 400, // editor height
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']], // only images, no video
                ['view', ['fullscreen', 'codeview']]
            ],
            callbacks: {
                onImageUpload: function(files, element) {
                    // files is an array of selected files
                    for (let i = 0; i < files.length; i++) {
                        uploadImage(files[i], $('.{{ $class_name }}'));
                    }
                },
                onChange: function(contents, $editable) {
                    // add a class to all images inside the editor
                    $editable.find('img').addClass('img-fluid rounded');

                    // add a class to all tables
                    $editable.find('table').addClass('table table-bordered');
                }
            }
        });
    });

    // function to upload image to server
    function uploadImage(file, selector) {
        let data = new FormData();
        data.append("file", file);

        $.ajax({
            url: "{{ route('upload.image') }}", // your server endpoint
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                // insert uploaded image into Summernote
                selector.summernote('insertImage', url);
            },
            error: function() {
                alert('Image upload failed.');
            }
        });
    }
</script>
