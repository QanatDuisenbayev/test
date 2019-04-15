<?php 
  $db = new PDO('mysql:host=localhost;dbname=database','root','');
  $db->exec("SET NAMES UTF8");
  $txt = trim($_POST['txt']);

if(isset($_POST['save'])){
  $txt = strip_tags($txt); //для xss атаки
  session_start();
  $code = $_SESSION['cap_code'];
  $user = $_POST['cap'];
  if($code === $user){
      $query = $db->prepare("INSERT INTO table_k SET txt='$txt'");
      $query ->execute();
      header("Location: main.php");
      exit();
  }
  else
    echo "invalid";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>5 тестовая задания</title>
  <meta charset="utf-8">
	 <link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
 	<div class="row">
    <div class="container">
      <div class="row">

      </div>
      <br><br>
      <div class="row">
        <div class="col-lg-12">

          <form id="test5" name="sentMessage" method="POST" action="">
              <div class="col-md-12">
                <div class="form-group">
                  <input class="form-control" id="txt" name="txt" type="text" placeholder="Текст *" required="required" data-validation-required-message="Введите текст.">
                </div>
              <div class="col-lg-12 text-center" style="color:white">
                  <img src="captcha.php">
                  <input type="text" name="cap">
                <button class="btn btn-primary btn-xl text-uppercase" name="save" type="submit" onclick="code()">Отправить</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
	</div>
   <script type="text/javascript">
  	function code(){
  		var txt = document.getElmentById("txt");
  		function reverseString(str) {
    	return str.split("").reverse().join("");
	}

	alert(reverseString(txt));
  	}
  </script>
</body>
</html>