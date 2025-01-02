<?php
if(isset($_SESSION['activeUSer']))
{

}
else
{
    header("location:auth");
}
?>