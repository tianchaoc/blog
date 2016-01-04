<?php
//发布文章检测用户是否是登录的
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit;
}
require_once 'db.php';
require_once'./inc/header.php';
function show($show,$url=''){
	echo '<script>alert("'.$show.'");window.local.herf="'.$url.'"</script>';
}
if(isset($_POST['submit'])){
	$query = "insert into `arts` (`id`,`title`,`content`,`time`) values (NULL,'".$_POST['title']."','".$_POST['content']."',now())";
	if(mysql_query($query)){
		echo "发布成功！";
        include_once './js/tza.js';
	}else{
		echo '失败，请重试',mysql_error();
	}
	die;
}
?>
<!DOCTYPE>
<html>
<head>
<title>发布文章-田超的博客</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="./js/jc.js"></script>
<link href="./css/style.css" rel="stylesheet" type="text/css">
  <link href="http://cdn.staticfile.org/twitter-bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://cdn.staticfile.org/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery.qeditor.css" type="text/css">
  <script src="http://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script src="js/jquery.qeditor.js" type="text/javascript"></script>
</head>
<body>   
<form action="" method="post" name="fbwz" onSubmit="return jc()">
	<div class="add_k">
	标题：<input type="text" name="title" size="60"><br/>
	内容：<textarea name="content" id="post_body" class="textarea" placeholder="文章内容"></textarea><br/>
	<input type="submit" name="submit" class="btn btn-success" value="发布">
	</div>
</form>
    <script type="text/javascript">
    $("#post_body").qeditor({});
    
    // Custom a toolbar icon
    var toolbar = $("#post_body").parent().find(".qeditor_toolbar");
    var link = $("<a href='#'><span class='icon-smile' title='smile'></span></a>");
    link.click(function(){
      alert("Put you custom toolbar event in here.");
      return false;
    });
    toolbar.append(link);
    
    // Custom Insert Image icon event
    function changeInsertImageIconWithCustomEvent() {
      var link = toolbar.find("a.qe-image");
      link.attr("onclick","");
      link.click(function(){
        alert("New insert image event");
        return false;
      });
      alert("Image icon event has changed, you can click it to test");
      return false;
    }
    
    $("#submit").click(function(){
      alert($("#post_body").val());
    });
    </script>
</body>
</html>
<?php require_once'./inc/footer.php'; ?>
