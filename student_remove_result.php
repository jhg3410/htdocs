<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$name = $_POST["userName"];

$sql = "DELETE FROM student WHERE name='".$name."'";

$ret = mysqli_query($con, $sql);

echo "<H1>회원 탈퇴 결과</H1>";
if($ret) { 
echo "회원 탈퇴 되셨습니다 ㅠㅠ!!";
}

else { 
echo "회원 탈퇴 실패!!!"."<BR>";
echo "실패 원인 :".mysqli_error($con);
} 
mysqli_close($con);

echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
?>