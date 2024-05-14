<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery.min.js"></script>
</head>
<body>

<form>
<input type="number" name="mobile" value="6287055423">
<textarea name="message"></textarea>
<button type="Submit">send</button>
</form>

<script>
 $(document).ready(function(){
$("form").submit(function(e){
e.preventDefault();
$.ajax({
type: "POST",
url: "sendsms.php",
data: new FormData (this), 
processData: false,
contentType:false,
cache:false,
success: function (response)
{
    alert(response);
}

});
});
});
    </script>
</body>
</html>