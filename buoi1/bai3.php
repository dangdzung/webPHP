<?php
    function tong($a,$b){
        return $a+$b;
    }
    
    function hieu($a,$b){
        return $a-$b;
    }
    function tich($a,$b){
        return $a*$b;
    }
    function thuong($a,$b){
        return $a/$b;
    }
    function nto($a){
        if($a<2){
            return false;
        }
        for($i=2;$i<=sqrt($a);$i++){
            if($a%2==0){
                return false;
            }
        }
        return true;
    }
    function kt($a){
        return $a%2==0;
    }
    
?>