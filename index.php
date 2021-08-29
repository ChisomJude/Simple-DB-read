<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
	 <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s013">
		
      <form action="" method="POST" > 
        <fieldset>
          <legend>FIND A COVID CENTER NEAR YOU</legend>
        </fieldset>
        <div class="inner-form">
          <div class="left">
            <div class="input-wrap first">
              <div class="input-field first">
                <label>LOCATION</label>
                <input type="text" name= "location" placeholder="ex: Lagos Mainland, Victoria Island" />
              </div>
            </div>
            <div class="input-wrap second">
              <div class="input-field second">
                <label>CENTER TYPE</label>
                <div class="input-select">
                  <select data-trigger="" name="centertype">
                    <option value="Vaccine"> Vacinnation Center</option>
                    <option value = "Test"> Test Center</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <input class="btn-search" type="submit" name="sbtn" value="SEARCH" /> 
        </div>

	<?php 
	    if(isset($_POST['sbtn'])){
		$location = $_POST['location'];
		$centertype = $_POST['centertype'];
	    if($centertype == 'Test'){
			
		// include dbcon page
            require 'dbcon.php';

		
       # Start form processing if test center
		
			$stmt = "SELECT * FROM covid_center WHERE center_location = '$location' ";
			

			$stmt = sqlsrv_query( $conn, $stmt);
			if( $stmt === false ) {
				die( print_r( sqlsrv_errors(), true));
			}

			
    ?>
		 <div class="">
		 <h5  style="color:#ffffff">
		  Search Results for COVID-19 <?php echo $location ."  - " . $centertype; ?> Center 
		 </h5>
		</div>

		<table class="table  table-responsive table-dark table-bordered  table-sm ">
			 <thead>
				<tr>	
					<td>Id</td>
					<td>Center Name </td>
					<td>Center Location and Address</td>
					<td>Contact </td>
					<td>Center Type</td>
				</tr>
			  </thead>
			<tbody>
			
			<?php 
				if(!isset($errors[2])){
					
                    while($data = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
		
					$x = 1;
					
					?>
				<tr>
					<td><?php echo ++$x; ?></td>
					<td><?php echo $data['center_name'] ?></td>
					<td><?php echo $data['center_location']. "<br>" . $data['center_address'] ?></td>
					<td><?php echo $data['center_contact'] ?></td>
					<td><?php echo $data['center_type'] ?></td>
				</tr>
					<?php }
                }
				
        ?>
				
			</tbody>
			
		</table>
	 
	<?php } #close if of testcenter
			else{
				echo "<h3 style='color:#ffffff'> Vacination Centers are not yet Available on our Website. Please check back soon </h3>";
			 }
	}?>	
</form>
      
	  </div>
	  <footer> 
		<div align="Center">
		  <marquee behavior="" direction="left">
			<h4>Design  By Chisom Jude for ALC <small>Frontend template by Colorlib, Content extracted from NCDC Website</small></h4>
		  </marquee>
		</div>
	  </footer>
	 
	</body>
  </html>
  