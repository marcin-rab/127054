<?php
$connect = mysqli_connect("localhost", "id5881270_ai127054", "admin", "id5881270_pokemony");
$query = "SELECT * FROM Pokemony ORDER BY ID ASC";
$result = mysqli_query($connect, $query);
?>

<script>
    if (!$check1_res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
</script>

 <!DOCTYPE HTML>
<html>
	<head>
		<title>Marcin Rabiza</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <script type="text/javascript" async
            src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.3/MathJax.js?config=TeX-MML-AM_CHTML">
        </script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="modules/mysql/jquery.tabledit.min.js"></script>
	</head>
    	<body>

<div class="table-responsive">  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Type 1</th>
        <th>Type 2</th>
        <th>Lifepoints</th>
      </tr>
     </thead>
     <tbody>
         
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["ID"].'</td>
       <td>'.$row["Nazwa"].'</td>
       <td>'.$row["Typ_podstawowy"].'</td>
       <td>'.$row["Typ_dodatkowy"].'</td>
       <td>'.$row["Zycie"].'</td>
      </tr>
      ';
     }
     ?>
     </tbody>
    </table>
   </div>  

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script src="assets/js/jquery.tabledit.js"></script>
            <script src="assets/js/jquery.tabledit.min.js"></script>

	</body>
</html>

<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'action.php',
      columns:{
       identifier:[0, "ID"],
       editable:[[1, 'Nazwa'], [2, 'Typ_podstawowy'], [3, 'Typ_dodatkowy'], [4, 'Zycie']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  
 </script>
