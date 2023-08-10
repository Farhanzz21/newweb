<!DOCTYPE html>
<html>
<head>
  <title>WELCOME TO FORMAT HUNTERS</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width-device-width, initial-scale-1">
<style type="text/css">
      body{
        background-image: url("Home.jpg");
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items:center;
        height:100vh;
      }
    </style>
<body>
<div class="main">
  <div class="image_1">
    <div class="layer">
      <div class="text_1">
        <div class="rectangle"><h2></h2>
          <br>
          <span></span>
          <br>
          <br>

      </div>
      
    </div>
    
  </div>
</div>
<div class="container">
  <img src="menuu.png" class="menu-icon" onclick="openmenu()">
  <div class="menu-box" id="menu">
    <div class="right-links">
      <a href="#">GET STARTED</a>
     <img src="closed.png" onclick="closemenu()">
    </div>
    <div class="menu-links">
      <a href="#">HOME</a>
      <a href="#">ABOUT US</a>
      <a href="#">OUR SERVICES</a>
      <a href="#">MY ACCOUNT</a>
       <a href="#">CONTACT US</a>
       <a href="#">MANAGE PLAN</a>
       <a href="#">VIEW THESIS</a>
      <a href="#">LOGOUT</a>
      
    </div>
  </div>
  
</div>
<script>
  var menu= document.getElementById("menu");
  function closemenu(){
    menu.style.top="-100vh";
  }
   function openmenu(){
    menu.style.top="17%";
  }
</script>
</body>
</html>