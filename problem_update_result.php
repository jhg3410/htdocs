<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$title = $_POST["title"];
$level = $_POST["level"];
$problemid = $_POST["problemid"];

$sql = "UPDATE problem SET title='".$title."', level = '".$level."' where problemid='".$problemid."' ";

$ret = mysqli_query($con, $sql);

echo "<H1>문제 수정 결과</H1>";
if($ret) { 
echo "문제 정보가 성공적으로 수정되셨습니다!!";
}

else { 
echo "데이터 수정 실패!!!"."<BR>";
echo "실패 원인 :".mysqli_error($con);
} 
mysqli_close($con);

echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
?>