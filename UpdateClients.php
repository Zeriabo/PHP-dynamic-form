session_start(); 
<html>
<head>
	<title> List of  Clients To be Updated </title>
</head>
<body style = "background-color: #3366CC">
	<h6 align = right> <a href = "Director.php"> Home </a> </h6>
	<p align='right'><a href = "SignOut.php"><b> Sign Out</b></a> </p>
	<?php

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

	$sqlQuery = "SELECT Pid,Memo,Salutation,SpouseId,HouseHoldPosition,LastNameAr,LastNameB4MR,FirstNameAr,
	                    MiddleNameAr,SalutationAr,NznFlag,ActionRequired
			 	 FROM clients";



	$resultSet = mysql_query ($sqlQuery, $dbConnection);
 	if (!$resultSet) {
		print ("DB Error: Could not retrieve Requests! <br />");
  		die (mysql_error ());
  	}

  	$num_rows = mysql_num_rows($resultSet);
  	if(mysql_num_rows($resultSet)< 1)
  	{
  		?><h2 align = "center" style = "color: blue"> No Clients ... !</h2>

               <script	type = "text/javascript" language = "JavaScript">
 		window.setTimeout("location.href='Director.php'", 3000);
 	</script>



  <?php
  die(0);
  	}else {
	?>

	<h2 align = "center" style = "color: blue"> List of Clients </h2>
 	<h3 style = "color: blue"> Search Results Are :

		</h3>
		<br />


<div class="clear"></div>
    <form name='dfrm' method="post" action="DoUpClients.php" >
  	<table	border = "1"
		 	width = "50%"
		 	cellpadding = "3"
		 	cellspacing = "2"
		 	style = "background-color: #99CC99">
      <input type='submit'  value='Delete' >
      <A HREF="javascript:window.print()">Click to Print This Page</A>
	  <tr>
	  <th align = "left"> Id </th>
	       <th align = "left"> Memo </th>
			<th align = "left"> Salutation</th>
			<th align = "left"> SpouseId</th>
			<th align = "left"> HouseHoldPosition</th>
			<th align = "left"> LastNameAr </th>
			<th align = "left"> LastNameB4MR </th>
			<th align = "left"> FirstNameAr </th>
			<th align = "left"> MiddleNameAr </th>
			<th align = "left"> SalutationAr</th>
			<th align = "left"> NznFlag</th>
            <th align = "left"> ActionRequired</th>
            <th align = "left"> Delete</th>

			 </tr>

	<?php

	While( $row = mysql_fetch_array ($resultSet, MYSQL_ASSOC)) {             print( "<tr>" );

             print ("<td><input type='text'  name='id[]' readonly='readonly' value='$row[Pid]'  ></td>");
             print ("<td><input type='text'  name='Memo[]'  value='$row[Memo]'  ></td>");
             print ("<td><input type='text'  name='Salutation[]'  value='$row[Salutation]'  ></td>");
             print ("<td><input type='text'  name='SpouseId[]'  value='$row[SpouseId]'  ></td>");
             print ("<td><input type='text'  name='HouseHoldPosition[]'  value='$row[HouseHoldPosition]'  ></td>");
             print ("<td><input type='text'  name='LastNameAr[]'  value='$row[LastNameAr]'  ></td>");
             print ("<td><input type='text'  name='LastNameB4MR[]'  value='$row[LastNameB4MR]'  ></td>");
             print ("<td><input type='text'  name='FirstNameAr[]'  value='$row[FirstNameAr]'  ></td>");
             print ("<td><input type='text'  name='MiddleNameAr[]' value='$row[MiddleNameAr]'  ></td>");
             print ("<td><input type='text'  name='SalutationAr[]' value='$row[SalutationAr]'  ></td>");
             print ("<td><input type='text'  name='NznFlag[]'  value='$row[NznFlag]'  ></td>");
             print ("<td><input type='text'  name='ActionRequired[]'  value='$row[ActionRequired]'  ></td>");




       print("<td><input type='checkbox'  name='du[]' value='$row[Pid]'  > </td>");


		print( "</tr>" );


 	}
   ?> <align='center'>
       <tr>
       <td ><input type='submit' value = 'Change'></td>
       <td ><input type='reset' value="Return Values"></td>
     </form>
	</table> <br />

	<?php



	$counter = mysql_num_rows ($resultSet);
	print ("<b> $counter Clients retrieved. <br /><br /></b>");


	mysql_close ($dbConnection);
      }
 }	?>
</body>
</html>
