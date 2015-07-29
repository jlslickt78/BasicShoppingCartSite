//begin navbar
function getCurrentPage(){
    var pageUrl = document.location.href;
    var pageName = pageUrl.substring(pageUrl.lastIndexOf("/") + 1);

    return pageName.toLowerCase();
}

var currentPage = getCurrentPage();
var fullUrl = document.location.href;
var urlArray = fullUrl.split("=");
var lastSegment = urlArray[urlArray.length-1];

switch(currentPage){
    case "index.php": $("#liHome").addClass("active");
        break;
    case "menu.php": $("#liMenu").addClass("active");
        break;
    case "order.php": $("#liOrder").addClass("active");
        break;
    case "location.php" : $("#liLocation").addClass("active");
        break;
    case "my_account.php" : $("#liMyAccount").addClass("active");
        break;
    case "login_form.php" : $("#liLogin").addClass("active");
}
//end navbar

//scroll to top
$("#toTop").hide();

$('#toTop').on({
    mouseover:function(){
        $(this).fadeIn("slow");
    }
});

$(window).bind("scroll", function(){
    $("#toTop").toggle($(this).scrollTop()>200);
});

$('#toTop').click(function (e) {
    $('html, body').animate({scrollTop: 0}, 'slow');
    e.preventDefault();
    return false;
});
//end scroll to top

/*accordian*/
$(document).ready(function(){
    /*home page*/
    $("#tabs").tabs({
        active:1,
        show:{effect:"highlight", duration:800}

    });

    //menu page
    //dialog when user enters page
    //did you know dialog / Enter text element as a div, with class .dialog
    var myDialog = $(".dialog");
    if($(myDialog).css("display") == "none"){

        myDialog.hide();
    }else{
        myDialog.dialog({
            title:"Did you know?",
            buttons:[{text:"OK", click:function(){
                $(this).dialog("close");
            }}]
        });
    }

    /*menu page accordion*/
    var icons = {
        header:"ui-icon-circle-arrow-e",
        activeHeader:"ui-icon-circle-arrow-s"
    };
   $("#accordion").accordion({
       icons:icons,
       collapsible:true,
       active:0,
       heightStyle:"content",
       animate:300
   });

    //sorting for accordion
    var sortableList = ".sortable";
    $(sortableList).sortable({
        axis:"y",
        items:"li",
        revert:true,
        cursor:"move",
        placeholder:"sortable-placeholder",
        start:function(event, ui){ui.helper.addClass("start-sort"),
            ui.placeholder.html(ui.item.html());},
        /*change:function(event, ui){ui.helper.addClass("change");},*/
        beforeStop:function(event, ui){ui.helper.removeClass("start-sort");}

    });


//snippets worth saving
/*
    $(sortableList).droppable({
       accept:function(el){
           return el.hasClass(".sortable");
       },
        drop:function(event, ui){
            item = ui.draggable;
            if(!item.hasClass("start-sort")){
            }
        }
    });*/
/*    $(".products").tooltip({
        show:{effect:"bounce"},
        position:{
            my:"left top+15",
            at:"left bottom",
            collision:"flipfit"
        },
        open: function(event, ui) {
            ui.tooltip.delay(2000).fadeTo(2000, 0);
        }
});*/


    //menu add to cart functions
   $(".product-add").button({
       icons:{primary:"ui-icon-plusthick"},
       label:"add to cart"
   });
  /*End menu page*/

/*contact page*/
    var contactReason = $("select option:selected").text();
       $("#contact-reason-select").selectmenu();

    $(".contact-submit").button();
    $(".contact-cancel").button();

    $("#contact-submit").click(function(event){
       $("#contact-form").submit();
        event.preventDefault();
    });

    $("#contact-cancel").click(function(event){
       $(location.href = "index.php");
    });

});





