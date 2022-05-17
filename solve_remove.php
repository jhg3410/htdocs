<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$solveid = $_GET["solveid"];

$sql = "DELETE FROM solve WHERE solveid='".$solveid."'";

$ret = mysqli_query($con, $sql);

echo "<H1>해결 문제 삭제 결과</H1>";
if($ret) { 
echo "삭제 되셨습니다!!";
}

else { 
echo "문제 삭제 실패!!!"."<BR>";
echo "실패 원인 :".mysqli_error($con);
} 
mysqli_close($con);

echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
?>