<?php
session_start();
if(isset($_SESSION['EmailAddress']) == '' && isset($_SESSION['Role']) == ''){
    header("Location:../Login.php");
}


$title = 'Admin Panel - Home Page';
include_once("header.php");
?>


<div style="height: 76vh;" class="container-fluid pt-4 px-1">
    <div class="form-con row justify-content-center align-items-center mx-0">
            <h1 style="text-align:center; color: #debd01; font-size: 72px;"> Welcome To Jenny's & Maria Glamouraé Luxe Store</h1>
    </div>
</div>



<?php include_once("footer.php"); ?>