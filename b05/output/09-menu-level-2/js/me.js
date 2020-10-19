$( document ).ready(function() {
    var currentFile  = window.location.pathname.split('/').pop();   // lấy đươc file hiện tại
    
    var currentMenu  = $('a[href="'+currentFile+'"]');              // lấy được thẻ a
    var menuName     = currentMenu.parent().data('parent');         // lấy được name của menu cần active

    
    if(menuName != undefined){
        $('li[data-name="'+menuName+'"]').addClass( "active" );
    }else {
        currentMenu.parent().addClass( "active" );
    }
});