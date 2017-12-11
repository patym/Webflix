<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UTF8_Enconde
 *
 * @author heon_3
 */
class UTF8_Enconde {
    
    public function array_utf8_encode_recursive($dat) {
        if (is_string($dat)) {
            return utf8_encode($dat);
        }
        if (is_object($dat)) {
            $ovs = get_object_vars($dat);
            $new = $dat;
            foreach ($ovs as $k => $v) {
                $new->$k = $this->array_utf8_encode_recursive($new->$k);
            }
            return $new;
        }

        if (!is_array($dat))
            return $dat;
        $ret = array();
        foreach ($dat as $i => $d)
            $ret[$i] = $this->array_utf8_encode_recursive($d);
        return $ret;
    }

    public function array_utf8_decode_recursive($dat) {
        if (is_string($dat)) {
            return utf8_decode($dat);
        }
        if (is_object($dat)) {
            $ovs = get_object_vars($dat);
            $new = $dat;
            foreach ($ovs as $k => $v) {
                $new->$k = $this->array_utf8_decode_recursive($new->$k);
            }
            return $new;
        }

        if (!is_array($dat))
            return $dat;
        $ret = array();
        foreach ($dat as $i => $d)
            $ret[$i] = $this->array_utf8_decode_recursive($d);
        return $ret;
    }

}

?>
