<?php
//SUCCESS
if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
echo "success: ".$_SESSION['success'];
echo "<br>";
//unset($_SESSION['success']);
}
//STATUS
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
echo "status: ".$_SESSION['status'];
echo "<br>";
//unset($_SESSION['status']);
}
			  
//URL
//if(isset($_SESSION['url']) && $_SESSION['url'] !=''){
echo "url: ".$url_atual;
echo "<br>";
//unset($_SESSION['status']);
//}

?>