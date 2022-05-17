<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");
 
$solveid = $_GET['solveid'];

$sql = "SELECT solvedate
        from solve
        where  solve.solveid = '".$solveid."'";


$ret = mysqli_query($con, $sql);
if($ret) { 
$count = mysqli_num_rows($ret);
if($count==0) { 
    echo $_GET['solveid']." 해당 아이디의 문제가 없음!!!"."<BR>";
    echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
    exit();
} 
 } 
 else { 
    echo "데이터 검색 실패!!!"."<BR>";
    echo "실패 원인 :".mysqli_error($con);
    echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
 exit();
 } 
 $row = mysqli_fetch_array($ret);
 
$solvedate = $row["solvedate"];

?> 
<HTML> 
<HEAD> 
<META http-equiv="content-type" content="text/html; charset=utf-8"> 
</HEAD> 
<BODY> 

<H1>해결 문제 수정</H1> 
<H3>문제의 제목과 난이도가 바꼈다면 관리자한테 말해서 수정부탁드려주세요!</H3>
<BR><BR>

<FORM METHOD="post" ACTION="solve_update_result.php"> 
    해결날짜 : <INPUT TYPE="text" NAME="solvedate" VALUE=<?php echo $solvedate ?>> <BR> 
    <INPUT TYPE="hidden" NAME ="solveid" VALUE = <?php echo $solveid ?>>
<BR><BR>
<INPUT TYPE="submit" VALUE="해결 문제 수정"> 

</FORM> 

</BODY> 
</HTML>