<?php
session_start();
?>
<html>
<head>

<meta charset="utf-8">
</head>


<?php

 //echo "<body background=\"bg1.jpg\">";
 echo "<body bgcolor=\"#D9FFFF\">";
    
?>
    <center>
    <h1>程式競賽報名網站</h1>
    <h3>照片上傳接收端</h3>
    </center>
<center>    <style>a{text-decoration:none}</style>
   
<a href="home.php"> &nbsp;首頁</a>
<a href="resiger.php"> &nbsp;我要報名</a>
<a href="action.php"> &nbsp;活動說明</a>
<a href="infor.php"> &nbsp;相關資訊</a>
<a href="contect.php"> &nbsp;聯絡我們</a>
<a href="in.php"> &nbsp;登入</a>
<a href="out.php"> &nbsp;登出</a>
	<a href="fire.php"> &nbsp;檔案上傳</a>
	<a href="photo.php"> &nbsp;照片展示</a>
	<?php
	if($_SESSION["check_result"]=="check_ok")
	{
		echo "歡迎 ".$_SESSION["account"]." 登入";
	}
    ?>
    
</center>
    <center>
    <?php 
		//檔案上傳資訊
       echo "<hr width=\"75%\">";
       echo "檔案名稱:".$_FILES['upload_file']['name']."<br>";
       echo "檔案大小:".$_FILES['upload_file']['size']."<br>";
       echo "檔案格式:".$_FILES['upload_file']['type']."<br>";
       echo "檔案名稱:".$_FILES['upload_file']['tmp_name']."<br>";
       echo "檔案代碼:".$_FILES['upload_file']['error']."<br>";
		//個人帳號路徑資訊    /home/108/za108a/108b32550/pubhtml
		//echo $_SERVER["PHP_SELF"]."<br>";
		//echo $_SERVER["SCRIPT_FILENAME"]."<br>";
		//echo __FILE__."<br>";
		echo dirname(__FILE__)."<br>";
		//echo basename(__FILE__)."<br>";
		//錯誤碼檢查
		if($_FILES['upload_file']['error'] > 0)
		{
	     switch($_FILES['upload_file']['error']){
			 case 1:die("檔案大小超出 php.ini:upload_max_filesize 限制"); 
	        case 2:die("檔案大小超出表單能傳送之 MAX_FILE_SIZE 限制");
	        case 3:die("檔案僅被部分上傳");
			 case 4:die("檔案未被上傳");
		  }
		}
       $img_format=false;
		if($_FILES['upload_file']['type']=="image/jpeg" or $_FILES['upload_file']['type']=="img/bmp")
		{
			$img_format=true;
			#echo "非JPG格式，檔案上傳錯誤五秒後跳轉";
			#echo "<meta http-equiv=\"Refresh\" content=\"3;url=http://webst.cjcu.edu.tw/~108b32550/fire.php\">";
		}
		if($img_format==true)
		{
			echo "你上傳的檔案為JPG或BMP成功";
		}
		else{
		    echo "非JPG格式或BMP，上傳錯誤3秒後跳轉";
			echo "<meta http-equiv=\"Refresh\" content=\"3;url=http://webst.cjcu.edu.tw/~108b32550/fire.php\">";
		}
		if($_FILES['upload_file']['size']>1000000)
		{
		
			echo "檔案過大，上傳錯誤3秒後跳轉";
			echo "<meta http-equiv=\"Refresh\" content=\"3;url=http://webst.cjcu.edu.tw/~108b32550/fire.php\">";
		}
		    echo "<hr width=\"75%\">";
        
		if(is_dir("picture"))
		{
			echo "檔案上傳中，5秒跳轉照片展示";
		}
		else{
			die("檔案不存在");
		}
		//搬上傳檔
	    if(is_uploaded_file($_FILES['upload_file']['tmp_name']))
		{//如果上傳檔案存在
			$dest_upload_file="/home/108/za108a/108b32550/pubhtml/picture/".$_FILES['upload_file']['name'];
			move_uploaded_file($_FILES['upload_file']['tmp_name'],$dest_upload_file);//現存之檔名->目的路徑./原來檔名
			echo "<meta http-equiv=\"Refresh\" content=\"5;url=http://webst.cjcu.edu.tw/~108b32550/photo.php\">";
		}
	
  		?>
		
	</center>

<?php
echo "<hr width=\"75%\">";
      echo "<center>&copy版權所有請勿侵占</center>";
?>
</body>

</html>
