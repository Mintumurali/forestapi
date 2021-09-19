<?php
include_once('../dbconnect.php');
header('Content-Type: application/json');

$result=array();
if(TRUE){
    /* $name=$_POST['uname'];
    $password=$_POST['password']; */
    $res=mysql_query("select * from `packages`");
    if(!$res){
        header("HTTP/1.0 405  Internal Error");
        $result['msg']="Internal Error Occured Operation Failed";
    }
    if(mysql_num_rows($res)>0){
        while($row=mysql_fetch_assoc($res)){
            header("HTTP/1.0 200  Success");
            //header("location:user/index.php");
            $result['data'][]=$row;
            $result['msg']=" Success";
            $result['status']="1";
        }
    }
    else{
//echo("<script>var invalid=true</script>");
    header("HTTP/1.0 404 Error in Input");
    $result['msg']="No Packages Found";
    $result['status']="-1";
    }
    echo json_encode($result);
}
?>