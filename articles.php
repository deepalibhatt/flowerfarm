<?php
include ("header.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tutorials</title>


    <!-- google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <!-- font awesome-->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- main css-->
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
  
<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
<style type="text/css">
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 100;
display: none;
}
.cnt223 a{
text-decoration: none;
}
.popup{
width: 100%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 101;
}
.cnt223{
min-width: 600px;
width: 600px;
min-height: 150px;
margin: 100px auto;
background: #f3f3f3;
position: relative;
z-index: 103;
padding: 15px 35px;
border-radius: 5px;
box-shadow: 0 2px 5px #000;
}
.cnt223 p{
clear: both;
    color: #555555;
    /* text-align: justify; */
    font-size: 20px;
    font-family: sans-serif;
}
.cnt223 p a{
color: #d91900;
font-weight: bold;
}
.cnt223 .x{
float: right;
height: 35px;
left: 22px;
position: relative;
top: -25px;
width: 34px;
}
.cnt223 .x:hover{
cursor: pointer;
}
</style>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});


 

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>
<div class='popup'>
<div class='cnt223'>
<h1>Fertilizers on Sale</h1>
<p>
Buy from us the best fertilizer and seeds in Kenya<br/>
Click on this link below: http://www.kenyaseed.com
<a href="http://www.kenyaseed.com/"></a>
<br/>
<br/>
<a href='' class='close'>Close</a>
</p>
</div>
</div>


<!-- Search Google -->
<br/><br/>
<center> 
<form method=GET action="http://www.google.com/search">
<table bgcolor="#e0e2db"><tr><td>
  <style type="text/css">
    body {
      background-color: #e0e2db;
    }
  </style>
<a href="https://www.google.com/" target="_blank"></a> 
<input type=text name=q size=50 maxlength=255 value="">
<input type=hidden name=hl value="en">
<input type=submit name=btnG VALUE="Google Search" >
</td></tr></table> 
</form>
</center>
<!-- Search Google -->


<!--Projects-->
<section id="projects">
  <section id="testimonial">
      <!-- title-->
      <div class="title">
      <div class="title-text">
        <h1>Articles</h1>
      </div>
      <div class="title-underline"> 
      </div>
      </div>
 <!-- end of title-->
 <center><h2>Planting Tips</h2></center>
 <div class="projects-container">
  <!-- item-->
  <article class="projects-item">
   <a href="https://www.wikihow.com/Plant-Roses" target="_blank"> <img src="login/images/full.jpg" alt="image"></a>
    <div class="img-text">
    <h1>How to Plant Roses</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Katie Gohmann-Horticulturist
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
    <a href="https://www.davidaustinroses.com/eu/advice-and-inspiration/the-basics-of-growing-roses" target="_blank"><img src="login/images/stage1.jpg" alt="image"></a>
    <div class="img-text">
    <h1>THE BASICS OF GROWING ROSES</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        David Austin
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
    <a href="https://www.hortzone.com/blog/2016/05/02/start-rose-flower-business-kenya/" target="_blank"><img src="login/images/1.jpeg" alt="image"></a>
    <div class="img-text">
    <h1>How to Start a Rose Flower Business in Kenya</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
         Chris 
      </div>

    </div>
    
  </article>
  <!-- end of item-->


  <!-- item-->
  <article class="projects-item">
    <a href="https://informationcradle.com/kenya/floriculture-in-kenya/" target="_blank"><img src="login/images/2.jpeg" alt="image"></a>
    <div class="img-text">
    <h1>Floriculture in Kenya</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
       Information Cradle
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
    <a href="https://www.plantopedia.com/caring-for-rose-plants/" target="_blank"><img src="login/images/3.jpeg" alt="image"></a>
    <div class="img-text">
    <h1>Growing Roses – Basics: Planting and Caring for Rose Plants</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Plantopedia.com
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
   <a href="https://www.heirloomroses.com/info/care/how-to/fertilize/" target="_blank"> <img src="login/images/4.jpg" alt="image"></a>
    <div class="img-text">
    <h1>Fertilize Roses</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Heir Loom Roses
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
    <a href="https://www.wikihow.com/Fertilize-Roses" target="_blank"><img src="login/images/5.jpg" alt="image"></a>
    <div class="img-text">
    <h1>How to Fertilize Roses</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Lauren Kurtz-Horticulturist
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
    <a href="https://www.bhg.com/gardening/flowers/roses/watering-roses/" target="_blank"><img src="login/images/6.jpg" alt="image"></a>
    <div class="img-text">
    <h1>Watering Roses</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Better Homes and Gardens
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
    <a href="https://homeguides.sfgate.com/water-roses-drip-irrigation-66269.html" target="_blank"><img src="login/images/7.jpeg" alt="image"></a>
    <div class="img-text">
    <h1>How to Water Roses With Drip Irrigation</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Home Guides
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
    <a href="http://cropnuts.com/common-rose-plant-diseases/" target="_blank"><img src="login/images/8.jpeg" alt="image"></a>
    <div class="img-text">
    <h1>COMMON ROSE PLANT DISEASES & HOW TO PREVENT THEM  </h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Ruth Vaughan
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
  <!-- item-->
  <article class="projects-item">
    <a href="https://www.planetnatural.com/rose-gardening-guru/pests-disease/" target="_blank"><img src="login/images/9.jpeg" alt="image"></a>
    <div class="img-text">
    <h1>Pests & Disease</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Planet Natural
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->

  <!-- item-->
  <!-- item-->
  <article class="projects-item">
    <a href="http://kenyaflowercouncil.org/?page_id=94" target="_blank"><img src="login/images/10.jpeg" alt="image" ></a>
    <div class="img-text">
    <h1>Industry Statistics</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Kenya Flower Council
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
   <!-- item-->
  <article class="projects-item">
    <a href="http://kenyaflowercouncil.org/?page_id=2312" target="_blank"><img src="login/images/11.jpeg" alt="image"></a>
    <div class="img-text">
    <h1>FSI Basket of Standards</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
         Kenya Flower Council
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
   <!-- item-->
  <article class="projects-item">
    <a href="https://www.ftd.com/blog/share/types-of-roses" target="_blank"><img src="login/images/12.jpg" alt="image"></a>
    <div class="img-text">
    <h1>Types of Roses</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
         FTD FRESH
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->
   <!-- item-->
  <article class="projects-item">
    <a href="http://bhattelectro.com/" target="_blank"><img src="login/images/13.jpg" alt="image"></a>
    <div class="img-text">
    <h1>Buy Farm Equipment and Machinary</h1>
    </div>
    <div class="img-footer">
      <div class="footer-icon">
      <i class="fa fa-comment-o"></i>0
      </div>

      <div class="footer-date">
        Bhatt Electro
      </div>

    </div>
    
  </article>
  
  <!-- end of item-->

 </div>

</section>




    <!-- end of Projects-->

     <!-- filler section--> 
      <section id="filler-contact">
        <h1>Find a need and Fill it!</h1>
        <button type="button">Contact Us</button>
        
      </section>
     <!-- end of filler section-->


</body>
</html>