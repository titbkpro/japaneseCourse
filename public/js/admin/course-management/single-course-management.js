function showAddCourseForm() {
    $('#new-course-form').removeClass('hidden');
}

function hideAddCourseForm() {
    $('#new-course-form').addClass('hidden');
}

function showEditCourseForm() {
    $('#edit-course-detail').removeClass('hidden');
}

function hideEditCourseForm() {
    $('#edit-course-detail').addClass('hidden');
}

function hideAllForm() {
    hideAddCourseForm();
    hideEditCourseForm();
}

function setEditCourseForm($selectedRow) {
    let courseId = $selectedRow.find('.course-id').val();
    let route = "{{route('course-manage.update', ':id')}}";
    $('#edit-course-form').attr("action", route.replace(":id", courseId));

    $('#id').val($selectedRow.find('.course-id').val());
    $('#name').val($selectedRow.find('.course-name').text());
    $('#time').val($selectedRow.find('.course-time').text());
    $('#fee').val($selectedRow.find('.course-fee').text());
    $('#description').val($selectedRow.find('.course-description').text());
    $('#sale_off').val($selectedRow.find('.course-sale-off').text());
    $('#image_id').val($selectedRow.find('.course-image-id').text());
}

$('#add-course-btn').on('click', function (){
    hideAllForm();
    showAddCourseForm();
});

$('.edit-course-btn').on('click', function (event){
    hideAllForm();
    let $selectedRow = $(event.target).parents('tr');
    setEditCourseForm($selectedRow);
    showEditCourseForm();
});
