$( document ).ready(function() {
    var currentFile  = window.location.pathname.split('/').pop();
    $('a[href="'+currentFile+'"]').parent().addClass( "active" );
});