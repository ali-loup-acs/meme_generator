$('.images').click(function(){
  $('#view')[0].src = $(this)[0].src;
    /*
    génération du chemin pour accéder à l'image
    */
    var currentPath = "";
    var realPath = $(this)[0].src.split('/');
    currentPath += realPath.pop();
    currentPath = '/' + currentPath;
    currentPath = realPath.pop() + currentPath;
    $('#image')[0].value = currentPath;
});
