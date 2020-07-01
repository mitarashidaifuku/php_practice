<?php

class TodoValidation{
    public static function blanckChckValidation($inputVal){
        if ($inputVal === ""){
            return false;
        }
        return true;
    }

    public static function wordLengthValidation($inputVal, $max){
        if(strlen($inputVal) >= $max){
            // 字数オーバー
            return false;
        }
        return true;
    }

}

 ?>
