<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$solvedate = $_POST["solvedate"];
$solveid = $_POST["solveid"];

$sql = "UPDATE solve SET solvedate='".$solvedate."' where solveid='".$solveid."' ";

$ret = mysqli_query($con, $sql);

echo "<H1>해결 문제 수정 결과</H1>";
if($ret) { 
echo "해결 날짜가 성공적으로 수정되셨습니다!!";
}

else { 
echo "데이터 수정 실패!!!"."<BR>";
echo "실패 원인 :".mysqli_error($con);
} 
mysqli_close($con);

echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
?>