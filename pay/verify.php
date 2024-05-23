

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Successful Message </title>

    <meta name="author" content="Codeconvey" />
    <!-- Message Box CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!--Only for demo purpose - no need to add.-->
	
</head>
<body>
		
<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">
 
            <!-- Ad Here -->
            
        </div>

    </div>
</div>



<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- partial:index.partial.html -->
<div id='card' class="animated fadeIn">

  <div id='lower-side'>
    <p id='message'>
      Congratulations, your payment has  been successfully debited.
      <br><br>
      thanks for buying our product
    </p>
    <p id="p-id">
        
        your payment is <br>  </p>
    <a href="index.html" id="contBtn">Continue</a>
  </div>
</div>
<!-- partial -->
    		
           
    		</div>
		</div>
    </div>
</section>
     


    <!-- Analytics -->
<script>
    function id(){
var p = document.getElementById("p-id");
p.innerHTML +=sessionStorage.getItem("p_id");
if(sessionStorage.getItem("p_id")!="undefined"){
   window.location ="purchase_entry.php";
}
else{
    alert("failed");
}
    }
    id();
</script>
	</body>
</html>