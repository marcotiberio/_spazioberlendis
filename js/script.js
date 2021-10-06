// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});


function goBack() {
    if (document.referrer == "") {
        window.location.href = "/#central/";
    } else {
        var objWindow = window.open(location.href, "_self");
        objWindow.close();
    }
    
}

$(function() {
    if ( document.location.href.indexOf('#central') > -1 ) {
        $("#hero").fadeOut();
        $("#showVideo").fadeIn();
    }
});

// function goBack() {
//     window.history.back();
// }

// function goBack() {
//     window.location.href = "/welcome/#central/";
// }


$(document).ready(function(){
    $("#newLogo").click(function() {
        // $('#newsCalendar').hide();
        $('#searchCalendar').hide();
        $( "#swiperSinistra" ).show();
        $( "#miniCalendar" ).show();
        $('#centrale').scrollTop(0);
        $('#destra').scrollTop(0);
    });
});

$(document).ready(function(){
    $("#logoDesktop").click(function() {
        $("#hero").fadeOut();
        $("#showVideo").fadeIn();
        $("#central").fadeIn();
    });
});

$(document).ready(function(){
    $( "#showFooterLeft" ).click(function() {
        $( "#colophonLeft" ).slideToggle();
        $( "#toggleUpLeft" ).toggleClass('spin');
    });
});

$(document).ready(function(){
    $( "#showFooterRight" ).click(function() {
        $( "#colophonRight" ).slideToggle();
        $( "#toggleUpRight" ).toggleClass('spin');
    });
});

$(document).ready(function(){
    $( "#showFooterLeftTemp" ).click(function() {
        $( "#colophonLeftTemp" ).slideToggle();
        $( "#toggleUpLeftTemp" ).toggleClass('spin');
    });
});


// Double Logo

$(document).ready(function(){
    $("#logoDesktop").click(function() {
        $("#logoDesktop").hide();
        $("#newLogo").show();
    });
});


// Target Specific Parent Div

$(document).ready(function() {
    if($('.show-todays-event>article.category-private-event').length !== 0) {
        $(".show-todays-event>article.category-private-event").parents(".show-todays-event").addClass("added-class");
    }
});


// Search Calendar

// function functionSearchCalendar() {
//     var input, filter, ul, li, article, a, i, txtValue;
//     input = document.getElementById('searchInputCalendar');
//     filter = input.value.toUpperCase();
//     ul = document.getElementById("searchCalendar");
//     li = ul.getElementsByTagName('li');
  
//     for (i = 0; i < li.length; i++) {
//       article = li[i].getElementsByTagName("article")[0];
//       txtValue = article.textContent || article.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         li[i].style.display = "";
//       } else {
//         li[i].style.display = "none";
//       }
//     }
// }

// Show/Hide Calendar on Search

$(document).ready(function(){
    $( "#searchInputCalendar" ).click(function() {
        $( "#newsCalendar" ).fadeToggle('fast');
        $( "#miniCalendar" ).fadeToggle();
        $( "#swiperSinistra" ).fadeToggle();
        $( "#searchCalendar" ).fadeToggle();
    });
});

$(document).ready(function(){
    $("#searchInputCalendar").click(function() {
        $("#searchCalendar li p").fadeToggle('slow');
        $("#searchCalendar li span").fadeToggle();
        $("#searchCalendar li a").fadeToggle();
        $("#searchCalendar li .post-thumbnail").fadeToggle();
    });
    $("#searchInputCalendar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#searchCalendar li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $("#searchCalendar li p").show();
        $("#searchCalendar li span").show();
        $("#searchCalendar li a").show();
        $("#searchCalendar li .post-thumbnail").show();
    });
});

// Search News


$(document).ready(function(){
    $("#searchInputNews").click(function() {
        $("#newsList li p").fadeToggle();
        $("#newsList li span").fadeToggle();
        $("#newsList li a").fadeToggle();
    });
    $("#searchInputNews").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#newsList li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $("#newsList li p").show();
        $("#newsList li span").show();
        $("#newsList li a").show();
    });
});


// Swiper Home

var swiper = new Swiper('#swiperHome', {
    spaceBetween: 30,
    grabCursor: true,
    // pagination: {
    //     el: "#swiperHome .swiper-pagination",
    // },
    navigation: {
        nextEl: "#swiperHome .swiper-button-next",
        prevEl: "#swiperHome .swiper-button-prev",
    },
});


$(document).ready(function(){
    $(".preview-title").mouseenter(function(){
      $(".preview-summary").css("display", "block");
    });
    $(".preview-title").mouseleave(function(){
      $(".preview-summary").css("display", "none");
    });
});



// MOBILE
// MOBILE
// MOBILE

$(function() {
    if ( document.location.href.indexOf('#centralMobile') > -1 ) {
        $("#hero").fadeOut();
        $("#centralMobile").fadeIn();
        $("#showFooterRightMobile").css("display", "grid");
    }
});

// Footers

$(document).ready(function(){
    $("#logoMobile").click(function() {
        $("#hero").fadeOut();
        $("#centralMobile").fadeIn();
        $("#showFooterRightMobile").css("display", "grid");
    });
});

$(document).ready(function(){
    $(".section-title-mobile").click(function() {
        $("#colophonLeftMobile").hide();
        $("#colophonRightMobile").hide();
    });
});

$(document).ready(function(){
    if($(window).width() >= 768){
        $("#logoMobile").click(function() {
            $("#hero").fadeOut();
            $("#centralMobile").fadeIn();
            $("#showVideo").fadeIn();
            $("#showFooterRightMobile").css("display", "grid");
        });
    }
});

$(document).ready(function(){
    $("#showFooterLeftMobile").click(function() {
        $("#colophonLeftMobile").slideToggle();
        $( "#toggleUpLeftMobile" ).toggleClass('spin');
    });
});

$(document).ready(function(){
    $("#showFooterRightMobile").click(function() {
        $("#colophonRightMobile").slideToggle();
        $( "#toggleUpRightMobile" ).toggleClass('spin');
    });
});


// Accordion Menu

// Single Click
// $(document).ready(function(){
//     $("#centralMobile .col-mobile").last().css('display', 'block');

//     var link = $("#centralMobile .section-title-mobile");

//     link.on('click', function(e) {

//         e.preventDefault();

//         var a = $(this).attr("href");

//         $(a).slideDown('fast');

//         $("#centralMobile .col-mobile").not(a).slideUp('fast');
        
//     });
// });

// Double Click
$(document).ready(function(){
    $("#centralMobile .col-mobile").last().css('display', 'block');
    var link = $("#centralMobile .section-title-mobile");
    link.on('click', function(e) {
        e.preventDefault();
        var a = $(this).attr("href");
        $(a).slideToggle('fast');
    });
    $("#titleMobileOne").click(function() {
        $("#two").hide();
    });
});



//______________________________CALENDAR______CONTROL_______________________??

//these scripts assume a couple of things listed here
//--the date of each slide is in a data-variable called date-data in each slides parent div. format yyyy-mm-dd
//--the slides are loaded in chronological order

var swiper = new Swiper('#swiperSinistra', {
    slidesPerView: 1,
    spaceBetween: 30,
    sensitivity: 0,
    mousewheelControl: false,
    loop: false,
    navigation: {
      nextEl: '#swiperSinistra .swiper-button-next',
      prevEl: '#swiperSinistra .swiper-button-prev',
    },
  });


//remove the original click events from clndr
$('document').ready(function() {
    var clndrID = $('.clndr-holder').attr('id');
    $('#'+clndrID).unbind();
});


//this function finds the closest eventdate and shows its slide on pageload
function showNextPostOnInit() {   
    var dateList = [];
$('.show-todays-event').each( function(){
    var dateItem = $(this).data("date");
    dateList.push(new Date(dateItem).getTime());
    })
    	
	var todayDate = new Date().setHours(0,0,0,0);
    var r = 0;
    
	for(var i=0; i<dateList.length; i++){
		var date = dateList[i];
		if(date == todayDate){
			r = r + 1;
		} else {
		}
    }

	if(r == 0){
		dateList.push(todayDate);
		dateList = dateList.sort();
		slideIndex = dateList.indexOf(todayDate) ;
        swiper.slideTo(slideIndex, 0)
	} else if(r == 1) {
		slideIndex = dateList.indexOf(todayDate) ;
        swiper.slideTo(slideIndex, 0);	}
}

// set array of eventDates to be used later

var eventDates = [];
    $('.show-todays-event').each( function(){
        var eventDate = $(this).data("date");
        eventDates.push(eventDate);
    })


setTimeout( 
    function(){
    showNextPostOnInit();
    setClickableEvents();
}, 100);


//Mark the dates, multiple if multiday event
//loop through wrappers to get dates, make date of events clickable. The for-loop calculates the inbetween dates and makes them clickable. The startdate is added as a datevariable to all clickable dates to be retrieved on click.     
function setClickableEvents(){
    $(".show-todays-event").each(function(i) {
        var dateStart = $(this).data("date");
        $('.calendar-day-' + dateStart).addClass('eventDay');
        $('.calendar-day-' + dateStart).attr('data-event', dateStart);

        var dateStartUnix = new Date(dateStart).getTime();
        var dateEndUnix = new Date($(this).data("date_end")).getTime()

        if(isNaN(dateEndUnix)){
        }else{

            var daysBetween = ((dateEndUnix - dateStartUnix) / 86400000);
            
            for(i = 0; i < daysBetween; i++) {
                dayToAdd = dateStartUnix + (86400000 * (i + 1));

                    function formatDate(date) {
                        var d = new Date(date),
                            month = '' + (d.getMonth() + 1),
                            day = '' + d.getDate(),
                            year = d.getFullYear();
                    
                        if (month.length < 2) 
                            month = '0' + month;
                        if (day.length < 2) 
                            day = '0' + day;
                                              
                        return [year, month, day].join('-');
                    }

                    $('.calendar-day-' + formatDate(dayToAdd)).addClass('eventDay');
                    $('.calendar-day-' + formatDate(dayToAdd)).attr('data-event', dateStart);
            }           
        }
    });
};       



//___CALENDAR BUTTONS
//Navigate to day on click
$(document).on('click', ".eventDay", function(){
    var dayDate = $(this).data('event');
    var dayDate = dayDate.replace('calendar-day-','');

	for(var i=0; i<eventDates.length; i++){
		var date = eventDates[i];
		if(date.indexOf(dayDate) != -1){
			var indexPosition = i;
		} else {
		}
    }
    swiper.slideTo(indexPosition, 300);
    // var distToScroll = $('#newsCalendar').height() + $('#searchCalendar').height() + $('#miniCalendar').height();
    // $('#sinistra').scrollTop( distToScroll );
    $('#newsCalendar').hide();
});


// Navigate calendar and set CLickable event dates
$(document).on('mousedown', ".clndr-next-button", function(){
	var clndrID = $('.clndr-holder').attr('id');
	var clndrCTRL = $('#'+clndrID).clndr();
	clndrCTRL.forward();
	setClickableEvents();
});

$(document).on('mousedown', ".clndr-previous-button", function(){
	var clndrID = $('.clndr-holder').attr('id');
	var clndrCTRL = $('#'+clndrID).clndr();
	clndrCTRL.back();
	setClickableEvents();
});


//___SWIPERBUTTONS
//move the calendar when the swiper is navigated
$(document).on('click', ["#swiperSinistra .swiper-button-next", "#swiperSinistra .swiper-button-previous"],  function(){
	setCalendarMonth();
	setClickableEvents();
});

//this function finds the active events month and year
function setCalendarMonth() {
	var currentSlide = swiper.activeIndex;
	var rawDate = eventDates[currentSlide];
    var currentMonth = new Date(rawDate).getMonth();
    var currentYear = new Date(rawDate).getFullYear();
	changeCalendar(currentMonth + 1, currentYear);
}

//does what it says
function changeCalendar(currentMonth, currentYear) {
	var clndrID = $('.clndr-holder').attr('id');
	var clndrCTRL = $('#'+clndrID).clndr();
	clndrCTRL.setMonth(currentMonth-1).setYear(currentYear);
}
