<?php 
namespace App\base;

class ResponseModel {
    public static function SUCCESS($data = null) {
        $response = array(
            'status' => true,
            'data' => $data
        );
        return json_encode($response);
    }

    public static function ERROR($message = null) {
        $response = array(
            'status' => false,
            'message' => $message
        );
        return json_encode($response);
    }
}