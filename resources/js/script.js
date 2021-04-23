setTimeout(function () {
    $('#alert').slideUp();
}, 4000);

$('#lfm').filemanager('image');

$(document).ready(function() {
    $('#description').summernote();
});

$(document).ready(function() {
    $('#summary').summernote();
});


 // Banners
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.dltBtn_banner').click(function (e) {
    var form=$(this).closest('form');
    var dataID=$(this).data('id');
    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this banner!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            form.submit();
            swal("Banner has been deleted!", {
                icon: "success",
            });
        } else {
            swal("Banner is saved!");
        }
    });
})


 // Categories
$('#is_parent').change(function (e) {
    e.preventDefault();
    var is_checked = $('#is_parent').prop('checked');
    if (is_checked) {
        $('#parent_cat_div').addClass('d-none');
        $('#parent_cat_div').val('');
    }
    else {
        $('#parent_cat_div').removeClass('d-none');
    }
})
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$('.dltBtn_category').click(function (e) {
    var form=$(this).closest('form');
    var dataID=$(this).data('id');
    e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
    .then((willDelete) => {
        if (willDelete) {
            form.submit();
            swal("Category has been deleted!", {
                icon: "success",
            });
        } else {
            swal("Category is safe!");
            }
    });
})


 // Products
 // toggle d-none for subcategories

