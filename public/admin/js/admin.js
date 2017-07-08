$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {

    $('#summernote').summernote({

        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0],editor,welEditable);
        }
    });

    $('#summernote-category').summernote();

    $('.note-editable').addClass('style-editor');

    $("#button-file").on('click', function () {
       $("#image-block-input-contact").trigger('click');
    });

    $("#button-file-gallery").on('click', function () {
        $("#image-block-input-gallery").trigger('click');
    });

    $("#image-block-input-gallery").change(function() {
        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''));
    });

    $("#image-block-input-contact").change(function() {

        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''));

        data = new FormData();
        data.append("image", $('form input[name=image]').get(0).files[0]);
        data.append('_token', $('meta[name="csrf-token"]').val());

        $.ajax({
            url:'/admin/ajaximage2',
            type:'POST',
            data: data,
            dataType:'json',
            async:false,
            processData: false,
            contentType: false,
            success:function(response){
                console.log(response);
            },
        });
    });

    $("#button-file-category").on('click', function () {
        $("#image-block-input-category").trigger('click');
    });

    $("#image-block-input-partners").change(function() {
        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''));
    });

    $("#button-file-partners").on('click', function () {
        $("#image-block-input-partners").trigger('click');
    });

    $("#image-block-input-category").change(function() {

        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''));

        data = new FormData();
        data.append("image", $('form input[name=image]').get(0).files[0]);
        data.append('_token', $('meta[name="csrf-token"]').val());

        $.ajax({
            url:'/admin/ajaximage3',
            type:'POST',
            data: data,
            dataType:'json',
            async:false,
            processData: false,
            contentType: false,
            success:function(response){
                console.log(response);
            },
        });
    });




});

function sendFile(file,editor,welEditable) {
    data = new FormData();
    data.append("file", file);
    var url = '/admin/ajaximage';
    console.log('image upload:', file, editor, welEditable);
    console.log(data);

    $.ajax({
        headers: { 'csrftoken' : '{{ csrf_token() }}' },
        data:  data,
        type: "POST",
        url: url,
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            editor.insertImage(welEditable, url);
        }
    });
}




