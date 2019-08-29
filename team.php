<?php
include ("./login/header.php")
?>
<html>
<head>
<title>Our Team </title>
<link href="style.css" rel="stylesheet" type="text/css">



</head>
<body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
}
.team-section{
  overflow: hidden;
  text-align: center;
  background: #34495e;
}
  padding: 0px;
}
.team-section h1{
  text-transform:uppercase;
  margin-bottom: 60px;
  color: white;
  font-size: 40px;
}
.border{
  display: block;
  margin: auto;
  width: 160px;
  height: 3px;
  background: #3498db;
  margin-bottom: 40px;
}
.ps{
  margin-bottom: 40px;
}

.ps a{
  display: inline-block;
  margin: 0 30px;
  width: 160px;
  height: 160px;
  overflow: hidden;
  border-radius: 50%;
}
.ps a img{
  width: 100%;
  filter: grayscale(100%);
  transition: 0.4s all;
}
.ps a:hover > img{
  filter: none;
}

.section{
  width: 600px;
  margin: auto;
  font-size: 20px;
  color: white;
  text-align: justify;
  height: 0;
  overflow: hidden;
}
.section:target{
  height: auto;
}
.name{
  display: block;
  margin-bottom: 30px;
  text-align: center;
  text-transform: uppercase;
  font-size: 22px;

}

body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
    background-color: #34495e;
}



</style>
</head>
<body>



<div class="team-section">
  <h1> Our Team</h1>
  <span class="border"></span>

  <div class="ps">
    <a href="#deepali"><img src="images/deepali.png" alt="Deepali"></a>
    <a href="#sianwa"><img src="images/sianwa.jpg" alt="Sianwa"></a>
    <a href="#hillary"><img src="images/hillary.png" alt="Hillary"></a>
    <a href="#adrian"><img src="images/adrian.png" alt="Adrian"></a>

  </div>

  <div class="section" id="deepali">
  <span class="name">Deepali Bhatt</span>
  <span class="border"></span>
  <p>Public relations (PR) is about managing reputation. A career in PR involves gaining understanding and support for your clients, as well as trying to influence opinion and behaviour. You'll use all forms of media and communication to build, maintain and manage the reputation of your clients.</p>
  </div>
  <div class="section" id="sianwa">
    <span class="name">Sianwa Atemi</span>
      <span class="border"></span>
      <p>In qualitative studies, the role of the researcher is quite different. The research is considered an instrument of data collection (Denzin & Lincoln, 2003). This means that data are mediated through this human instrument, rather than through inventories, questionnaires, or machines.</p>
    </div>
    <div class="section" id="hillary">
      <span class="name">Hillary Omondi</span>
        <span class="border"></span>
        <p>The CEO's leadership role also entails being ultimately responsible for all day-to-day management decisions and for implementing the Company's long and short term plans. The CEO acts as a direct liaison between the Board and management of the Company and communicates to the Board on behalf of management.</p>
      </div>
      <div class="section" id="adrian">
        <span class="name">Adrian Kimaru</span>
        <span class="border"></span>
        <p>Salesperson: Position and Functions Performed by a Sales Person! A salesperson is an important sales management position maintaining vital link between an enterprise and customers, society, distributors, retailers and others. Nature of roles played by a sales person is given as follows.</p>
      </div>


</header>


</body>
<!-- filler section--> 
      <section id="filler-contact">
        <h1>Find a need and Fill it!</h1>
        <button type="button">Contact Us</button>
        
      </section>
     <!-- end of filler section-->

</html>
