<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");


$sql ="SELECT @ROWNUM := @ROWNUM + 1 AS 'rank',  name,grade,department, count(*)
        FROM student, solve, (SELECT @ROWNUM := 0) R
        where student.studentid = solve.studentid
        group by student.studentid
        order by count(*) DESC;";

$ret = mysqli_query($con, $sql);

echo "<H1>모든 유저들의 랭킹은!!!</H1>";

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
    echo "<TH>랭크</TH> <TH>이름</TH> <TH>학년</TH> <TH>학과</TH> <TH>푼 문제 수</TH>";
    echo "</TR>";
    
    while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
        echo "<TD>", $row['rank'], "</TD>";
        echo "<TD>", $row['name'], "</TD>";
        echo "<TD>", $row['grade'], "</TD>";
        echo "<TD>", $row['department'], "</TD>";
        echo "<TD>", $row['count(*)'], "</TD>";

    }
    
mysqli_close($con);
echo "</TABLE>";
echo "<BR> <A HREF='main.html'> <--처음으로 돌아갈래!</A> <BR>";
?> 