$(document).ready(function(){

AddEventListener();
activateMenu()
//CloseSpan();

    
});
function AddEventListener()
{
    var thumbnail = document.getElementsByClassName("photo");
    for(i = 0; i < thumbnail.length; i++){
        thumbnail[i].addEventListener('click', mySpan);
        //console.log("Hello World!");
    }
}

function mySpan(e) 
{
        var span = document.createElement('span');
        // set the ID for the span
        span.setAttribute("id","pop-up");
        // set attribute class to img pop-up 
        var image = document.createElement('img');
        span.setAttribute("class","img-popup");
         console.log("Hello World!");
          //e.target.src = the element that call the pop-up
         image.src = e.currentTarget.src.replace("small","large");
         span.innerHTML="<img src='" +  image.src + "'>" ;
         console.log(span);
         console.log(e);
         //Insert image into span
         e.currentTarget.insertAdjacentElement("afterend", span);
         span.addEventListener('click', closel);
         
}
function closel(e)
{
    //console.log(e.target)
     // Click function that removes the img-popup
         e.target.parentNode.remove();
}


/*
* This function toggles the nav menu active/inactive status as
* different pages are selected. It should be called from $(document).ready()
* or whenever the page loads.
*/
function activateMenu()
{
 var current_page_URL = location.href;
 $(".navbar-nav a").each(function()
 {
 var target_URL = $(this).prop("href");
 if (target_URL === current_page_URL)
 {
 $('nav a').parents('li, ul').removeClass('active');
 $(this).parent('li').addClass('active');
 return false;
 }
 });
}


 