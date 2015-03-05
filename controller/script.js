
$(function(){
    $(window).scroll(function () {
        //Au scroll dans la fenetre on déclenche la fonction
    if ($(this).scrollTop() > 90) {
    //si on a défilé de plus de 150px du haut vers le bas
    $('#navigationes').addClass("fixNavigation");
    //on ajoute la classe "fixNavigation" à <div id="navigation">
    }
    else {
        $('#navigation').removeClass("fixNavigation");
        //sinon on retire la classe "fixNavigation" à <div id="navigation">
        }
    });
});
