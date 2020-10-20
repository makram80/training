<?php require_once('inc/bdd.php');  $req2 = $bdd->query("SELECT * FROM subs ORDER BY id DESC LIMIT 1 "); foreach ($req2 as $row){?> 
<!doctype html>
<html lang="">
<head>   
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/bootstrap441.min.css">
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<meta http-equiv="refresh" content="300"> 
<title>Dashboard</title>
<link rel="shortcut icon" type="image/orange" href="img/orange.png"/>
 <style>
.progress {
  width: 150px;
  height: 150px;
  background: none;
  position: relative;
}
.progress::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 6px solid #eee;
  position: absolute;
  top: 0;
  left: 0;
}
.progress>span {
  width: 50%;
  height: 100%;
  overflow: hidden;
  position: absolute;
  top: 0;
  z-index: 1;
}
.progress .progress-left {
  left: 0;
}
.progress .progress-bar {
  width: 100%;
  height: 100%;
  background: none;
  border-width: 6px;
  border-style: solid;
  position: absolute;
  top: 0;
}
.progress .progress-left .progress-bar {
  left: 100%;
  border-top-right-radius: 80px;
  border-bottom-right-radius: 80px;
  border-left: 0;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}
.progress .progress-right {
  right: 0;
}
.progress .progress-right .progress-bar {
  left: -100%;
  border-top-left-radius: 80px;
  border-bottom-left-radius: 80px;
  border-right: 0;
  -webkit-transform-origin: center right;
  transform-origin: center right;
}
.progress .progress-value {
  position: absolute;
  top: 0;
  left: 0;
}
.rounded-lg {
  border-radius: 1rem;
}

.text-gray {
  color: #aaa;
}
div.h4 {
  line-height: 1rem;
}
</style>
<style>
.nav-item a {   
    text-decoration: none;
    font: 17px Century Gothic;
    position: relative;
    z-index: 0;
}
.topBotom a:before, .topBotom a:after {
    position: absolute;
    left: 0px;
    width: 100%;
    height: 2px;
    background:orange;
    content:"";
    opacity: 0;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
}
.topBotom a:before {
    top: 4px;
    transform: translateY(10px);
}
.topBotom a:after {
    bottom: 4px;
    transform: translateY(-10px);
}
.topBotom a:hover:before, .topBotom a:hover:after {
    opacity: 1;
    transform: translateY(0px);
}
.dropdown-menu{
    background: gray;
    border:0;
    top:70%;    
}
.dropdown-item:hover{
    background:orange;
    color:#fff;
}
.dropdown-menu a{ color:#fff; } 
</style>
<style></style>
</head>
<body>  
 <div class="container-fluid">
 <div class="card-body card bg-dark">
 		
	<nav class="navbar navbar-expand-lg navbar-dark">   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse " id="navbarText">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active topBotom "><a class="nav-link" href="http://CoreKpi/valeurs.php">Historique</a></li>
		<li class="nav-item active topBotom "><a class="nav-link" id="modal_ported" href="#">Portabilité</a></li>		    			
		<li class="nav-item dropdown"><a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown">Trafic Core</a>
	    <ul class="dropdown-menu">
		    <li><a class="dropdown-item" href="http://CoreKpi/quadro.php">Vue Globale</a></li>
		    <li><a class="dropdown-item" href="http://CoreKpi/CS.php">CS</a></li>
		    <li><a class="dropdown-item" href="http://CoreKpi/PS.php">PS</a></li>
			<li><a class="dropdown-item" href="http://CoreKpi/Detail_Attdata.php">Attdata par SGSN</a></li>
	    </ul>
	    </li>			    
    </ul>
    </div>		
	<a class="navbar-brand font-weight-bold text-warning" href="#"><h3 class="card-subtitle mb-2 font-weight-bold text-right text-warning">
    <?php $dt_last = $row['kpidate']; $date=date_create("$dt_last"); echo "Maj: &nbsp;". date_format($date,"d-m-Y H:i");?></h3></a>	
    </nav> 	

<h4 class="card-title display-4 font-weight-bold text-center text-warning">Répartition_Abonnés_Instantanés</h4><br>
<div class="row d-flex justify-content-center align-items-center">   		
	<div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">	  
        <h3 class="h3 font-weight-bold text-center mb-4 text-warning">Attached_2G</h3> 		
        <h3 class="h3 font-weight-bold text-center mb-4"><?php echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['Att2G'];?></h3>		  		
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['Att2G_yesterday'];?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['Att2G_avg'];?></div><span class="small text-gray">Avg</span>
          </div>
        </div>  
        <div class="progress mx-auto" data-value='<?php echo $row['Att_2G'];?>'>
          <span class="progress-left"><span class="progress-bar border-warning"></span></span>
          <span class="progress-right"><span class="progress-bar border-warning"></span></span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold"><?php echo $row['Att_2G'];?><sup class="small">%</sup></div>
          </div>
        </div>   		
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0"><?php echo $row['Att_2G_yesterday']." %" ;?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0"><?php echo $row['Att_2G_avg']." %" ;?></div><span class="small text-gray">AVG</span>
          </div>
        </div> 		
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">
        <h3 class="h3 font-weight-bold text-center mb-4  text-warning">Attached_3G</h3> 
        <h3 class="h3 font-weight-bold text-center mb-4"><?php echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['Att3G'];?></h3>		
		<div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['Att3G_yesterday'];?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['Att3G_avg'];?></div><span class="small text-gray">Avg</span>
          </div>
        </div>  				
        <div class="progress mx-auto" data-value='<?php echo $row['Att_3G'];?>'>
          <span class="progress-left"><span class="progress-bar border-warning"></span></span>
          <span class="progress-right"><span class="progress-bar border-warning"></span></span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold"><?php echo $row['Att_3G'];?><sup class="small">%</sup></div>
          </div>
        </div>      
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0"><?php echo $row['Att_3G_yesterday']." %" ;?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0"><?php echo $row['Att_3G_avg']." %" ;?></div><span class="small text-gray">AVG</span>
          </div>
        </div>       
      </div>
    </div> 
    <div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">
        <h3 class="h3 font-weight-bold text-center mb-4  text-warning">Attached_4G</h3>
		<h3 class="h3 font-weight-bold text-center mb-4"><?php echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['actifs4g'];?></h3>
		<div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['actifs4g_yesterday'];?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['actifs4g_avg'];?></div><span class="small text-gray">Avg</span>
          </div>
        </div>  				
        <div class="progress mx-auto" data-value='<?php echo $row['Att_4G'];?>'>
          <span class="progress-left"><span class="progress-bar border-warning"></span></span>
          <span class="progress-right"><span class="progress-bar border-warning"></span></span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold"><?php echo $row['Att_4G'];?><sup class="small">%</sup></div>
          </div>
        </div>    
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0"><?php echo $row['Att_4G_yesterday']." %" ;?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0"><?php echo $row['Att_4G_avg']." %" ;?></div><span class="small text-gray">AVG</span>
          </div>
        </div>      
      </div>
    </div> <?php }$req2->closeCursor();?> <!-- end req2 subs -->	
</div><!-- end circle -->
<?php $req2 = $bdd->query("SELECT * FROM subs ORDER BY id DESC LIMIT 1 "); foreach ($req2 as $row){?> 
<div class="card-body"> 
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">	  
        <h3 class="h3 font-weight-bold text-center mb-4 text-warning">Attached_Data</h3> 		
        <h3 class="h3 font-weight-bold text-center mb-4"><?php echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['Attdata'];?></h3>		  		
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['Attdata_yesterday'];?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['Attdata_avg'];?></div><span class="small text-gray">Avg</span>
          </div>
        </div>  		
    </div></div> <?php }$req2->closeCursor();?>	
<?php $req1 = $bdd->query("SELECT * FROM kpi ORDER BY id DESC LIMIT 1 "); foreach ($req1 as $row) { ?>
	<div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">	  
        <h3 class="h3 font-weight-bold text-center mb-4 text-warning">Attached_Voix</h3> 		
        <h3 class="h3 font-weight-bold text-center mb-4"><?php echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['actifsvoix'];?></h3>		  		
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['actifsvoix_yesterday'];?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['actifsvoix_avg'];?></div><span class="small text-gray">Avg</span>
          </div>
        </div>  		
    </div></div> 
    <div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">	  
        <h3 class="h3 font-weight-bold text-center mb-4 text-warning">Roamers</h3> 		
        <h3 class="h3 font-weight-bold text-center mb-4"><?php echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['roamers'];?></h3>		  		
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['roamers_yesterday'];?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['roamers_avg'];?></div><span class="small text-gray">Avg</span>
          </div>
        </div>  		
    </div></div> 	
    <div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">	  
        <h3 class="h3 font-weight-bold text-center mb-4 text-warning">Clients-1-jour</h3> 		
        <h3 class="h3 font-weight-bold text-center mb-4"><?php echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['clients1jour'];?></h3>		  		
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['clients1jour_yesterday'];?></div><span class="small text-gray">Hier</span>
          </div>
          <div class="col-6">
            <div class="h5 font-weight-bold mb-0"><?php echo $row['clients1jour_avg'];?></div><span class="small text-gray">Avg</span>
          </div>
        </div>  		
    </div></div> 
	<?php }$req1->closeCursor();?>
</div>
</div><!-- end card body2--> 

<div class="row d-flex justify-content-center align-items-center">	  
	<div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">	  
        <h3 class="h3 font-weight-bold text-center mb-4 text-warning">HLR</h3> 		
        <h3 class="h3 font-weight-bold text-center mb-4"><?php $req3 = $bdd->query("SELECT creehlr FROM kpi WHERE creehlr not in(' ') ORDER BY id DESC LIMIT 1 "); 
		foreach ($req3 as $row) { echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['creehlr']; }$req3->closeCursor(); ?></h3>		  				
      </div>
    </div>
	<div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">	  
        <h3 class="h3 font-weight-bold text-center mb-4 text-warning">Ported In</h3> 		
        <h3 class="h3 font-weight-bold text-center mb-4"><?php $req4 = $bdd->query("SELECT * FROM ported ORDER BY id DESC LIMIT 1 "); 
		foreach ($req4 as $row) { echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['portedin']; ?></h3>		  				
      </div>
    </div>  
    <div class="col-xl-3 col-lg-6">
      <div class="bg-white rounded-lg p-3 shadow">	  
        <h3 class="h3 font-weight-bold text-center mb-4 text-warning">Ported Out</h3> 		
        <h3 class="h3 font-weight-bold text-center mb-4"><?php echo '<img src="img\available2.png" style="width:8%"></a>'.'&nbsp;'. $row['portedout']; }$req4->closeCursor(); ?></h3>		  				
      </div>
    </div>  	
</div>
</div> <!--card-body-->  			
</div> <!-- container -->	

	<div class="modal fade" id="PortedModal">
            <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title ">Enregistrer Ported In/Out</h4>
            </div>
            <div class="modal-body">           
		    <div class="form-row">			
		    <div class="form-group col-md-6">
            <label for="portedin">Ported In</label>
            <input type="text" class="form-control" id="portedin" name="portedin"> 
            </div>				
			<div class="form-group col-md-6">
            <label for="portedout">Ported Out</label>
            <input type="text" class="form-control" id="portedout" name="portedout" >           
            </div></div>
			</div>	
            <div id="result"></div> <!-- Data will load under this tag!--> 			
            <div class="modal-footer">
			<input type="submit" name="action" id="action" class="btn btn-success"/>
			<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
			</div>
			</div>
			</div>
	</div><!--Fin modal ajouter ported -->
	
<script type="text/javascript" src="js/jquery341.min.js"></script> 
<script type="text/javascript" src="js/popper1160.min.js"></script>
<script type="text/javascript" src="js/bootstrap441.min.js"></script>
<script>
$(function() {
  $(".progress").each(function() {
    var value = $(this).attr('data-value');
    var left = $(this).find('.progress-left .progress-bar');
    var right = $(this).find('.progress-right .progress-bar');
    if (value > 0) {
      if (value <= 50) {
        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
      } else {
        right.css('transform', 'rotate(180deg)')
        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
      }
    }
  })
  function percentageToDegrees(percentage) {
    return percentage / 100 * 360
  }
});
</script>
<!-- PORTED -->
<script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser() // This function will fetch data from table and display under <div id="result">
 {
  var action = "Load";
  $.ajax({
   url : "ported.php", 
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#result').html(data); //It will display data under div tag with id result
   }
  });
 }
 //This JQuery code will Reset value of Modal item when modal will load for create new records
 $('#modal_ported').click(function(){
  $('#PortedModal').modal('show'); //It will load modal on web page
  $('#portedin').val(''); //This will clear Modal first name textbox
  $('#portedout').val(''); //This will clear Modal last name textbox
  $('.modal-title').text("Enregistrer Ported In/Out"); //It will change Modal title 
  $('#action').val('Ajouter'); //This will reset Button value ot Create
 });
 //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
 $('#action').click(function(){
  var portedin = $('#portedin').val(); //Get the value of first name textbox.
  var portedout = $('#portedout').val(); //Get the value of last name textbox
  var id = $('#id').val();  //Get the value of hidden field customer id
  var action = $('#action').val();  //Get the value of Modal Action button and stored into action variable
  if(portedin != '' && portedout != '') //This condition will check both variable has some value
  {
   $.ajax({
    url : "ported.php",    
    method:"POST",     //Using of Post method for send data
    data:{portedin:portedin, portedout:portedout, id:id, action:action}, //Send data to server
    success:function(data){
     alert(data);    //It will pop up which data it was received from server side
     $('#PortedModal').modal('hide'); //It will hide Customer Modal from webpage.
     fetchUser();    // Fetch User function has been called and it will load data under divison tag with id result
    }
   });
  }
  else
  {
   alert("Both Fields are Required"); //If both or any one of the variable has no value them it will display this message
  }
 });
 //This JQuery code is for Update customer data. If we have click on any customer row update button then this code will execute
 $(document).on('click', '.update', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  var action = "Select";   //We have define action variable value is equal to select
  $.ajax({
   url:"ported.php",   
   method:"POST",    //Using of Post method for send data
   data:{id:id, action:action},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
    $('#PortedModal').modal('show');   //It will display modal on webpage
    $('.modal-title').text("Update Records"); //This code will change this class text to Update records
    $('#action').val("Update");     //This code will change Button value to Update
    $('#id').val(id);     //It will define value of id variable to this customer id hidden field
    $('#portedin').val(data.portedin);  //It will assign value to modal first name texbox
    $('#portedout').val(data.portedout);  //It will assign value of modal last name textbox
   }
  });
 });
 //This JQuery code is for Delete customer data. If we have click on any customer row delete button then this code will execute
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  if(confirm("Are you sure you want to remove this data?")) //Confim Box if OK then
  {
   var action = "Delete"; //Define action variable value Delete
   $.ajax({
    url:"ported.php",    
    method:"POST",     //Using of Post method for send data
    data:{id:id, action:action}, //Data send to server from ajax method
    success:function(data)
    {
     fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
     alert(data);    //It will pop up which data it was received from server side
    }
   })
  }
  else  //Confim Box if cancel then 
  {
   return false; //No action will perform
  }
 });
});
//test git
// test2
//
//
//
//
</script>


</body>
</html>