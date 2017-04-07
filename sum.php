<?php
 if(isset($_POST['send'])){
    $first=$_POST['first'];
    $second=$_POST['second'];
    $sum=$first+$second;
     echo $sum;
$even=$sum%2;
 if($even==0)
    {
$msg="Number is even";
    }
else{
   $msg="Number is odd";
    }
}
?>
