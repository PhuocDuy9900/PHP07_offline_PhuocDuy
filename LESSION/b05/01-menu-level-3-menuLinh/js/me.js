$(document).ready(function() {
    var currentFile = window.location.pathname.split('/').pop();
    console.log(currentFile)
    var currentMenu = $('a[href="'+ currentFile +'"]');
    console.log(currentMenu)
    var menuName = currentMenu.parent().data('parent');

    if(menuName != undefined) {
        $('li[data-name= "'+menuName+'"]').addClass('active');
    } else {
        currentMenu.parent().addClass('active');
    }
    
})