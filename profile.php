<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");


$sql =" SELECT *  FROM student ";

$ret = mysqli_query($con, $sql);

echo "<H1>모든 유저들의 정보!!</H1>";

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
    echo "<TH>이름</TH> <TH>학년</TH> <TH>학과</TH>";
    echo "</TR>";
    
    while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
        echo "<TD>", $row['name'], "</TD>";
        echo "<TD>", $row['grade'], "</TD>";
        echo "<TD>", "<A HREF='sameDepartment_student.php?department=", $row['department'], "'>".$row['department']."</A></TD>";
    }
    
mysqli_close($con);
echo "</TABLE>";
echo "<BR> <A HREF='main.html'> <--처음으로 돌아갈래!</A> <BR>";
?> 