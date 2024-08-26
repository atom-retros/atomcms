@props(['name', 'content' => null])

<div class="mt-3">
    <textarea name="content" id="editor">
        {{ $content ?? ''}}
    </textarea>
</div>


{{-- <script src="https://cdn.tiny.cloud/1/{{ $settings->get('tinymce_api_key') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script>

    tinymce.init({
        selector: 'textarea#editor',
        plugins: 'lists image',
        toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'

    });

</script>