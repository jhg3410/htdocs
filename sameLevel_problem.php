<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");

$level = $_GET['level'];


$sql =" SELECT *
        from problem
        where problem.level = '".$level."'  ";

$ret = mysqli_query($con, $sql);

echo "<H1>난이도가 ".$level."인 문제들</H1>";

if($ret) { 
    $count = mysqli_num_rows($ret);
    }
    else { 
        echo "데이터 조회 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
        echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
        exit();
    }

    echo "<TABLE BORDER=1>";
    echo "<TR>";
    echo "<TH>문제번호</TH> <TH>제목</TH> <TH>난이도</TH>";
    echo "</TR>";
    
    while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
        echo "<TD>", "<A HREF='each_problem_solve.php?problemid=", $row['problemid'], "'>".$row['problemid']."</A></TD>";
        echo "<TD>", $row['title'], "</TD>";
        echo "<TD>", $row['level'], "</TD>";
    }
    
mysqli_close($con);
echo "</TABLE>";
echo "<BR> <A HREF='main.html'> <--처음으로 돌아갈래!</A> <BR>";
?> 