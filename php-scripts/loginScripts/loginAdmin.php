<?php
	function validation(){
        
        if(empty($_POST['username']))
        {
            echo "Username is empty";
            return false;
        }
        if(empty($_POST['passid']))
        {
            echo "Password is empty";
            return false;
        } 
        elseif (!empty($_POST['passid'])) {
            $p= $_POST['passid'];
            $pattern="@[A-Z]@";
            $a=preg_match($pattern,$p);
        if(!$a){
            echo "Please enter password according to required conditions";
            return false;
        }
    }
}
    validation();

?>