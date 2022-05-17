<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$sql_sid = "SELECT studentid FROM student where name = '".$_POST['userName']."'";

$sql = "SELECT problem.problemid, title, level, solvedate, solveid
        FROM student, solve, problem 
        WHERE name ='".$_POST['userName']."' and solve.studentid = student.studentid and problem.problemid = solve.problemid";

$ret = mysqli_query($con, $sql);
$ret_sid = mysqli_query($con, $sql_sid);

$row_sid = mysqli_fetch_array($ret_sid);
$studentid = $row_sid['studentid'];

if($ret) { 
$count = mysqli_num_rows($ret);
}
else { 
    echo "데이터 입력 실패!!!"."<BR>";
    echo "실패 원인 :".mysqli_error($con);
    echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";

    exit();
}

echo "<TABLE BORDER=1>";
echo "<TR>";
echo "<TH>문제번호</TH> <TH>제목</TH> <TH>난이도</TH> <TH>해결날짜</TH> <TH>수정</TH> <TH>삭제</TH>";
echo "</TR>";

while($row = mysqli_fetch_array($ret)) {
    echo "<TR>";
    echo "<TD>", $row['problemid'], "</TD>";
    echo "<TD>", $row['title'], "</TD>";
    echo "<TD>", $row['level'], "</TD>";
    echo "<TD>", $row['solvedate'], "</TD>";
    echo "<TD>", "<A HREF='solve_update.php?solveid=", $row['solveid'], "'>수정</A></TD>";
    echo "<TD>", "<A HREF='solve_remove.php?solveid=", $row['solveid'], "'>삭제</A></TD>";    
}

    mysqli_close($con);
?>


<HTML> 
<HEAD> 
    <META http-equiv="content-type" content="text/html; charset=utf-8"> 
</HEAD> 
<BODY> 

<H1>해결한 문제 등록</H1>
<FORM METHOD="post" ACTION="register_result.php">
    문제 번호 : <INPUT TYPE="text" NAME="problemID"> <BR> 
    문제 제목 : <INPUT TYPE="text" NAME="Title"> <BR> 
    난이도 : <INPUT TYPE="text" NAME="level"> <BR> 
    해결 날짜 : <INPUT TYPE="text" NAME="solveDate"> <BR> 
    <INPUT INPUT TYPE="hidden" NAME = "studentid" VALUE = <?php echo $studentid ?>>
    <BR><BR> 
    <INPUT TYPE="submit" VALUE="문제 등록"> 
    <BR><BR> 
    <BR><BR> 
<H1>해결한 문제</H1>
</FORM>
</BODY> 
</HTML>

