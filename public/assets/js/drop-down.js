//TOGGLING NESTED ul
$(".drop-down .selected a").click(function() {


    if ( $( this ).hasClass( "active" ) ) {
        $(this).removeClass("active");
    } else {
        $(".drop-down .selected a").removeClass("active");
        $(this).addClass("active");
    }
    if (  $(this).parents(".drop-down").find("ul").hasClass( "active" ) ) {
        $(this).parents(".drop-down").find("ul").removeClass("active");
    } else {
        $(".drop-down .options ul").removeClass("active");
        $(this).parents(".drop-down").find("ul").addClass("active");
    }
});

//SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
$(".drop-down .options ul li a").click(function() {
    var text = $(this).html();
    $(this).parents(".drop-down").find(".chose").html(text);
    $(this).parents(".drop-down").find(".chose").addClass("active");
    $(".drop-down .options ul").removeClass();
    $(".drop-down .selected a").removeClass("active");
});


//HIDE OPTIONS IF CLICKED ANYWHERE ELSE ON PAGE
$(document).bind('click', function(e) {
    var $clicked = $(e.target);
    if (! $clicked.parents().hasClass("drop-down")){
        $(".drop-down .selected a").removeClass("active");
        $(".drop-down .options ul").removeClass();
    }
});