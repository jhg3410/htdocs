<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$name = $_POST["userName"];
$grade = $_POST["grade"];
$department = $_POST["department"];


$sql = "UPDATE student SET name='".$name."', grade='".$grade."', department='".$department."' where name='".$name."'";

$ret = mysqli_query($con, $sql);

echo "<H1>회원 정보 수정 결과</H1>";
if($ret) { 
echo "데이터가 성공적으로 수정되셨습니다!!";
}

else { 
echo "데이터 수정 실패!!!"."<BR>";
echo "실패 원인 :".mysqli_error($con);
} 
mysqli_close($con);

echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
?>