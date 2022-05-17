<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");
 
$problemid = $_GET['problemid'];

$sql = "SELECT *
        from problem
        where  problem.problemid = '".$problemid."'";


$ret = mysqli_query($con, $sql);
if($ret) { 
$count = mysqli_num_rows($ret);
if($count==0) { 
    echo $_GET['problemid']." 해당 문제가 없음!!!"."<BR>";
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
 
$title = $row["title"];
$level = $row["level"];

?> 
<HTML> 
<HEAD> 
<META http-equiv="content-type" content="text/html; charset=utf-8"> 
</HEAD> 
<BODY> 

<H1>문제 수정</H1> 
<H3>관리자만 수정 할 수 있습니다.</H3>
<BR><BR>

<FORM METHOD="post" ACTION="problem_update_result.php"> 
    제목 : <INPUT TYPE="text" NAME="title" VALUE=<?php echo $title ?>> <BR> 
    난이도 : <INPUT TYPE="text" NAME="level" VALUE=<?php echo $level ?>> <BR> 
    <INPUT TYPE="hidden" NAME ="problemid" VALUE = <?php echo $problemid ?>>
<BR><BR>
<INPUT TYPE="submit" VALUE="문제 수정"> 

</FORM> 

</BODY> 
</HTML>