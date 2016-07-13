<?php
include_once('../functions/mysql.php'); 

$conn = mysql_open();

// //$sql = "INSERT INTO 'srtp'.'subject_news' ('sId', 'title', 'category', 'releaseDate', 'author', 'content') VALUES ('2', 'hello', '你好', '2014-04-09 19:03:33', 'yehongjiang', 'this is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test messagethis is a test message');"
// $sql = "insert into subject_news(sId,title,category,releaseDate,author,content) VALUES
// (2,'hello','hello','2014-10-1 20:01:01','gonggong','goggong')";
// $query = mysql_query($sql);

// if($query)
// 	echo "success";
// else
// 	echo "failed";
$page = intval($_POST['pageNum']);  
$result = mysql_query("select sId from subject_news"); 

$total = mysql_num_rows($result);
$pageSize = 4; 
$totalPage = ceil($total/$pageSize); 

$startPage = $page*$pageSize; 

$arr['total'] = $total; 
$arr['pageSize'] = $pageSize; 
$arr['totalPage'] = $totalPage; 
$query = mysql_query("select title,category,releaseDate,author,content from subject_news order by sId asc limit  
$startPage,$pageSize");  
while($row=mysql_fetch_array($query)){ 
     $arr['list'][] = array( 
     	'total' => $totalPage,
     	'title' => $row['title'],
        'category' => $row['category'], 
        'releaseDate' => $row['releaseDate'], 
        'author' => $row['author'], 
        'content'=> $row['content'],
     ); 
} 
echo json_encode($arr);
?>