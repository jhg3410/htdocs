<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$userName = $_POST["userName"];
$grade = $_POST["grade"];
$department = $_POST["department"];

$sql =" INSERT INTO student(name,grade,department) VALUES ('".$userName."','".$grade."','".$department."')";

$ret = mysqli_query($con, $sql);

echo "<H1>신규 회원 입력 결과</H1>";
if($ret) { 
    echo "데이터가 성공적으로 입력됨.";
}
else { 
    echo "데이터 입력 실패!!!"."<BR>";
    echo "실패 원인 :".mysqli_error($con);
}
mysqli_close($con);

echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
?>