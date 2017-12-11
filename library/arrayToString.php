<?php

class arrayToString {

    public function toString($array){
        $string  = array();
        foreach ($array as $value) {
            if(is_array($value)){
                $string[] = $this->toString($value);
            }else{
                $string[] = $value;
            }
        }
        return implode(', ', array_values($string));
    }
}

?>
