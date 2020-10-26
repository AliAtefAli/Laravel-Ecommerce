$(document).ready(function () {
    var languages = ['en', 'ar'];
    languages.forEach(function (element) {

        CKEDITOR.replace( 'editor-'+element);
    });
});
