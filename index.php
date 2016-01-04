<!DOCTYPE html>
<?php
//引入文件
  require_once 'db.php';
  include_once'./inc/header.php';
  ?>
<html lang="en" class="no-js">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>首页-田超的博客|原创独立个人博客</title>
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<script src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script>
        <script type="text/javascript">uaredirect("http://tianchaoc.sinaapp.com/m");</script>
       
        <!--雪花开始-->
    <link id="sdcss" rel="stylesheet" type="text/css" href="css/common1.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script> 
    <script type="text/javascript" src='js/snow.js'></script>
        <!-- 雪花结束-->
	</head>
	<body>
          <!--按钮开-->
        <a href="javascript:;"><div id="kai">下雪</div></a><!--按钮开-->
        <a href="javascript:;"><div id="guan">晴天</div></a><!--按钮关-->
		<div class="wrap">
                <?php 
//设定每页显示的文章数
$pagesize=7;
//确定页数P的参数
@$p=$_GET['p']?$_GET['p']:1;
//数据指针
$offset = ($p-1)*$pagesize;
//查询本页显示的数据
  $query = "select * from `arts` order by id DESC limit $offset,$pagesize";  //查询数据
  $res=mysql_query($query);
  while ($row=mysql_fetch_array($res)){ //循环开始
?>
				<div class="title"><a href="view.php?id=<?php echo $row['id']?>" target="_blank" title="<?php echo $row['title']?>"><?php echo $row['title']?></a></div>
            
				<div class="content"><p><?php echo iconv_substr($row['content'],0,300,'utf-8');echo '......';?></p></div>
					
<?php 
  }
?> 
		</div>
        <div class="fy">  
<?php 
//计算留言总数
$count_result=mysql_query("select count(*) as count from arts");
$count_array=mysql_fetch_array($count_result);
//计算总页数
$pagenum=ceil($count_array['count']/$pagesize);

//输出各个页数和链接
if($pagenum>1){
    for($i=1;$i<=$pagenum;$i++){
        if($i==$p){
            echo '[',$i,']';
        }else{
            echo "&nbsp".'<a href="?p=',$i,'">',$i,'&nbsp</a>';
        }
    }
}
if($p>5){
echo '<a href="?p=',$pagenum,'">末页</a>'; 
}
echo "&nbsp".'共',$count_array['count'],'篇文章';
?>
</div>
	</body>
</html>
<?php include_once'./inc/footer.php'?>
<div class="snow-container"></div>
