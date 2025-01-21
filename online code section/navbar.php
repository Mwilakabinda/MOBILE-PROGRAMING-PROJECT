<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    nav{
    position:relative;
    background-color: skyblue;
    height: 70px;
    width: 100%;
    z-index: 1;
    box-shadow: 2px red;
    padding-bottom: 70px;
} 
ul{
    position: relative;
    float: right;
    margin-right: 30px;
    padding-right:15px;
}
ul li{
  padding-right:15px;
    display: inline-block;
    line-height: 70px;
}
ul li a{
   
    text-decoration: none;
    color: white;
    font-size: 17px;
}
.logo{
    font-size: 25px;
    position: relative;
    left: 5%;
    color: white;
    font-weight: bold;
    line-height: 70px;
}
  </style>
</head>
<body>
<nav>
    <label class="logo" >School Schedule Timetable</label>

<ul>
    <li><a href="home.php">Home</a></li>
    
    <li><a href="view_notices.php">View Notices</a></li>
    <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
    
</ul>
</nav>
</body>
</html>