$(".type").click( function() {
    $("table.filtered").removeClass("filtered");
    $(".filter").removeClass("filter");
    $(".sorter-false").removeClass('hideth');          //SHOW-HIDE TH

    // window.location.hash = '';

    var filter = $(this)[0].textContent.toLowerCase().replace(' ', '_');
    $("." + filter).addClass('filter');
    $(".tablesorter").toggleClass('filtered');
    $(".sorter-false").toggleClass('hideth');            //SHOW-HIDE TH

    window.location.hash = filter;
});

$(".clear").click(function(){
    $("table.filtered").removeClass("filtered");
    $(".filter").removeClass("filter");
    $(".sorter-false").removeClass('hideth');          //SHOW-HIDE TH

    window.location.hash = '';
    
});


if(window.location.hash) {

    var filter = window.location.hash.substr(1);
    $("." + filter).toggleClass('filter');
    $(".tablesorter").toggleClass('filtered');
    $(".sorter-false").toggleClass('hideth');           

    window.location.hash = filter;

}