<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$problemID = $_POST["problemID"];
$title = $_POST["Title"];
$level = $_POST["level"];
$solveDate = $_POST["solveDate"];
$studentid = $_POST["studentid"];


$sql =" INSERT INTO solve(studentid,problemid,solvedate)    
        VALUES ('".$studentid."','".$problemID."','".$solveDate."')";

$sql_pro =" INSERT IGNORE INTO problem(problemid,title,level)    
VALUES ('".$problemID."','".$title."','".$level."')";


$ret_pro = mysqli_query($con, $sql_pro);
$ret = mysqli_query($con, $sql);


echo "<H1>해결한 문제 입력 결과</H1>";
if($ret) { 
echo "문제가 잘 올라갔습니다~! <BR>";
}
else { 
echo "데이터 입력 실패!!!"."<BR>";
echo "실패 원인 :".mysqli_error($con);
}
mysqli_close($con);
echo "<BR> <A HREF='main.html'> <--처음으로 돌아갈래!</A> <BR>";
?> 