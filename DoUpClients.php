
<html>
<head>


	<title> List of  Updates Clients </title>
</head>
<body style = "background-color: #3366CC">
	<h6 align = right> <a href = "index.html"> Home </a> </h6>
	<p align='right'><a href = "SignOut.php"><b> Sign Out</b></a> </p>
	<?php
	     extract($_POST);
         $count=count($_POST['id']);

    	if (!isset($_SESSION['man']))
        {
		echo "<h3> You are not  a Manager </h3>";
        echo "<h1>Go Out....You Will Be Sent Away  </h1>";
        ?>
        	<script	type = "text/javascript" language = "JavaScript">
 		window.setTimeout("location.href='index.html'", 3000);
 	</script>
    <?php

          }else{

include_once "MySQLConnection.php";



            if(isset($_POST['du']))
            {

          $countCheck = count($_POST['du']);

          $checked = $_POST['du'];

     //Request Delete function begins
     if($countCheck>0)

     {

  for($i=0; $i<$countCheck;$i++)
  {


                $del_id  = $du[$i];

	      	 $SQL="Delete
	      	       from client
	      	       where Pid= '$del_id '";

	      $re = mysql_query ($SQL, $dbConnection);


           if($re){echo" <br>  Deleted id =  $del_id";}
            else{echo"<br>  it Was Not Deleted id= $del_id ";}

  }


    }// Request Delete function begin
   }else{
      for($i=0; $i<$count;$i++)
  {
   $sqlUpdate="update client
              set  Memo='Memo[$i]',Salutation='$Salutation[$i]',SpouseId='$SpouseId[$i]',HouseHoldPosition='$HouseHoldPosition[$i]'
                   LastNameAr='$LastNameAr[$i]',LastNameB4MR='$LastNameB4MR[$i]',FirstNameAr='$FirstNameAr[$i]',MiddleNameAr='$MiddleNameAr[$i]'
                   SalutationAr='$SalutationAr[$i]',NznFlag='$NznFlag[$i]',ActionRequired='$ActionRequired[$i]'
              where Pid='id[$i]' ";

            $res = mysql_query ($sqlUpdate, $dbConnection);


           if($res){echo" <br>Updated records: %d\n,". mysql_affected_rows();}
            else{echo"<br>  it Was Not Updated ";}


        }


     }
     }


 	?>
</body>
</html>