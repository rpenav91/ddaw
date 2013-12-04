<?php  
class Ddaw {
	public static function arrayToObject($d) {
        $object = json_decode(json_encode($d), FALSE);
        return $object;
    }
}