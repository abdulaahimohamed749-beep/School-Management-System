<?php

$conn = new  mysqli ("localhost","root","","abdullahi_school");

if($conn->connect_error){
    echo $conn->error;

}else{
  echo "success";
}


?>