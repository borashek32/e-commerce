


    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote();
});

    $('#is_parent').change(function (e) {
    e.preventDefault();
    var is_checked = $('#is_parent').prop('checked');
    // alert(is_checked);
    if (is_checked) {
    $('#parent_cat_div').addClass('d-none');
    $('#parent_cat_div').val('');
}
    else {
    $('#parent_cat_div').removeClass('d-none');
}
})
