// Search News

// $(document).ready(function(){
//     $('.article-centrale').show();
//     $('#search').click(function(){
//         $('.article-centrale').show();
//         var txt = $('#search-criteria').val();
//         $('.article-centrale').each(function(){
//         if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
//             $(this).fadeIn();
//         } else {
//             $(this).fadeOut();
//         }
//         });
//     });
// });

// ALternative Search News
function functionSearch() {
    // Declare variables
    var input, filter, ul, li, article, a, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("newsList");
    li = ul.getElementsByTagName('li');
  
    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      article = li[i].getElementsByTagName("article")[0];
      txtValue = article.textContent || article.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }

// Show/Hide About

function showabout() {
    var x = document.getElementById("hidden");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}


// Types

$(document).ready(function(){
    $( "#headerCalendar" ).click(function() {
        $( "#centrale" ).animate({
            top: "93vh",
            }, 200 );
        });
    });

$(document).ready(function(){
    $( "#headerCalendar" ).click(function() {
        $( "#destra" ).animate({
            top: "96vh",
            }, 200 );
        });
    });

$(document).ready(function(){
    $( "#headerNews" ).click(function() {
        $( "#destra" ).animate({
            top: "96vh",
            }, 200 );
        });
    });

$(document).ready(function(){
    $( "#headerCalendar" ).click(function() {
        $( "#sinistra" ).animate({
            top: "2vh",
            }, 200 );
        });
    });

$(document).ready(function(){
    $( "#headerNews" ).click(function() {
        $( "#centrale" ).animate({
            top: "5vh",
            }, 200 );
        });
    });

$(document).ready(function(){
    $( "#headerAbout" ).click(function() {
        $( "#destra" ).animate({
            top: "8vh",
            }, 200 );
        });
    });

$(document).ready(function(){
    $( "#headerAbout" ).click(function() {
        $( "#centrale" ).animate({
            top: "5vh",
            }, 200 );
        });
    });







$(document).ready(function(){
    $(".preview-title").mouseenter(function(){
      $(".preview-summary").css("display", "block");
    });
    $(".preview-title").mouseleave(function(){
      $(".preview-summary").css("display", "none");
    });
});


$(".type").click( function() {
    $("centrale.filtered").removeClass("filtered");
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