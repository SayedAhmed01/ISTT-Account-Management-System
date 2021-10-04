<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
    

.links2, .submenu {
  list-style: none;
  padding: 0;
  margin: 0;
  border: 1px solid #eee;
}

.links2 a{
  display: block;
  background-color: #003366;
  text-decoration: none;
  padding: 10px;
 
  
}



.links2 a:hover {
    background-color: #C5C5C5;
     
}




.links2 li:hover .submenu {
  display: block;
  max-height: 150px;
 }



.submenu a{
  background-color:#003366;
}


.submenu a:hover {
  background-color: red;
}


.submenu {
  overflow: hidden;
  max-height: 0;
  -webkit-transition: all 0.5s ease-out;
}

.sidebar {
    max-width: 25%;
    height: 600px;
    
    background-color:#003366;
}

.links h3 {
    padding: 10px;
    color: white;
    font-weight: 500;
}
.links2 h3 {
    padding: 2px;
    color: white;
    font-weight: 500;
}

.links {
    border: 1px solid #eee;
}



</style>
</head>
<body>
    
         
<div class="sidebar">
    <div class="Wrapper">
        <div class="links">
            <a href="newadd.php"><h3>New Student Admission</h3></a>
        </div>
<div class="links2">
        <li class="link2"><a href=""> <h3>Settings</h3></a>
         <ul class="submenu">
       
        <li><a href="program.php"><h3>Program</h3></a></li>
         <li><a href="session.php"><h3>Session</h3></a></li>
           </ul>
         </li>
        </div>
        <div class="links">
            <a href="addfees.php"><h3>Add fees / payment</h3></a>
        </div>
        <div class="links">
            <a href="expenditure.php"><h3>Expenditure</h3></a>
        </div>
        
        <div class="links">
            <a href="loan.php"><h3>Loan</h3></a>
        </div>

        <div class="links">
            <a href="change-password.php"><h3>Change Password</h3></a>
        </div>
        

    </div>
</div>
</body>
</html>