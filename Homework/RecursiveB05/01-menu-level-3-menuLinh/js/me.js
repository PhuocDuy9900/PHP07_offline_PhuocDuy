$(document).ready(function() {
    var currentFile = window.location.pathname.split('/').pop();
    
    var currentMenu = $('a[href="'+ currentFile +'"]');
    var menuName = currentMenu.parent().data('parent');

    if(menuName != undefined) {
        $('li[data-name= "'+menuName+'"]').addClass('active');
    } else {
        currentMenu.parent().addClass('active');
    }
})