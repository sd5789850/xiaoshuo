<?php
/**********************520小说*********************
*****************小说内容文章列表采集**************
***************************************************/
  require_once "config.db.php";
  echo "<meta charset=utf8>";
  ini_set('max_execution_time',864000); //执行时间无限制
  
  $action = $_GET['act'];
  if($action=='cj_list'){
      //获取网页内容
  	  $con = file_get_contents("http://520xs.co/17658.html");
      //小说内容文章列表采集正则 
      preg_match_all("/<dd><a href=\"17658\/(.*)\/\" title=\"([\s\S]*?)\">([\s\S]*?)<\/a><\/dd>/", $con, $arr1); 
      //trim(strip_tags($arr3[1]));
      $count = count($arr1[1]);
      echo  '一共'.$count.'章'."<br>";
      for($i=0; $i<$count; $i++){
      echo '章节名称：'.zm($arr1[3][$i]).'&nbsp;&nbsp;章节ID：'.$arr1[1][$i];
      echo "<br>";
    } 
  }  

/**************************************************
*****************小说内容采集**********************
***************************************************/
  // if($action=='cj_content'){
    for($a=1586641; $a<=1586960; $a++){
      $con1 = file_get_contents("http://520xs.co/17658/$a/");  //获取网页内容
      preg_match("/<div class=\"content\" id=\"floatleft\" id=\"content\">([\s\S]*?)<script>readcpc2/", $con1, $arr1);
      preg_match("/<h1 class=\"dirtitle\">([\s\S]*?)<\/h1>/", $con1, $arr2);
      if(empty($arr1)){
        continue;
      }else{
        $title = zm($arr2[1]);
        $content = zm($arr1[1]);
        $novel_content = Array('novel_id'=>'17658', 'chapter_id'=>"$a", 'sort_id'=>'3', 'chapter_title'=>"$title", 'chapter_content'=>"$content");
        $rt = $db->insert('tb_novel_content',$novel_content);
        //echo '<div align="center">'.zm($arr2[1]).'</div>'.'<p>'.zm($arr1[1]).'</p>'.'<hr>';
      }
    }
      if($rt){ echo ' 写入数据库成功'; }
  // }

//   for($p=1; $p<=10; $p++){ 
//     $con2 = file_get_contents("http://520xs.co/sort/3/$p/");
//     preg_match_all("/<div class=\"c_subject\"><a href=\"\/(.*)\/\">([\s\S]*?)<\/a><\/div>/", $con2, $arr1);

//     // print_r($arr1[2]);

//     $count = count($arr1[1]);
//     echo  '一共'.$count.'章'."<br>";
//     for($i=0; $i<$count; $i++){
//     echo '章节名称：'.zm($arr1[2][$i]).'&nbsp;&nbsp;章节ID：'.$arr1[1][$i];
//     //print_r(zm($arr1[2][$i]));
//     echo "<br>";
//   }
// }








//函数的声明
// function get_content($url){
//   for($i=1; $i<=3; $i++){
//     $string = file_get_contents($url);
//     if(!empty($string)) return $string;
//     sleep(2);//休眠2秒钟
//   }
//   return "";
// }

//中文字符转码
function zm($info){
  $value = iconv('gbk', 'utf-8', $info);
  return $value;
}

?>
