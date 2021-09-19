<?php
include_once('../dbconnect.php');
header('Content-Type: application/json');

$result=array();
if(isset($_POST['uname']) && isset($_POST['password'])){
    $name=$_POST['uname'];
    $password=$_POST['password'];
    $res=mysql_query("select * from `user` where `Name`='$name' and `Password` ='$password'");
    if(!$res){
        header("HTTP/1.0 405  Internal Error");
        $result['msg']="Internal Error Occured Operation Failed";
    }
    elseif(mysql_num_rows($res)>0){
        if($row=mysql_fetch_assoc($res)){
            header("HTTP/1.0 200  Success");
            $_SESSION['uid']=$row['AutoId'];
            $_SESSION['utype']='user';
            //header("location:user/index.php");
            $result['data']['uid']=$row['AutoId'];
            $result['data']['utype']='user';
            $result['msg']="login Success";
            $result['status']="1";
        }
    }
    else{
//echo("<script>var invalid=true</script>");
    header("HTTP/1.0 500 Error in Input");
    $result['msg']="invalid login";
    $result['status']="-1";
    }
   
}
else{
    header("HTTP/1.0 500 No Access");
    $result['msg']="Not Autherised To Use This Api";
    $result['status']="-2";
}
echo json_encode($result);
?>