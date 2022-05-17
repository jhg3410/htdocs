<?php 
$con = mysqli_connect("localhost", "id201801704", "pw201801704", "jikjoon") or die("MySQL 접속 실패!!");
 
 
$sql = "SELECT * FROM student WHERE name= '".$_POST['userName']."'";

$ret = mysqli_query($con, $sql);
if($ret) { 
$count = mysqli_num_rows($ret);
if($count==0) { 
    echo $_POST['userName']." 아이디의 회원이 없음!!!"."<BR>";
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
 
$name = $row['name'];
$grade = $row["grade"];
$department = $row["department"];

?> 
<HTML> 
<HEAD> 
<META http-equiv="content-type" content="text/html; charset=utf-8"> 
</HEAD> 
<BODY> 

<H1>회원 탈퇴</H1> 
<FORM METHOD="post" ACTION="student_remove_result.php"> 
    이름 : <INPUT TYPE="text" NAME="userName" VALUE=<?php echo $name ?>> <BR> 
<BR><BR>
<INPUT TYPE="submit" VALUE="탈퇴 ㅠ"> 
</FORM> 

</BODY> 
</HTML>