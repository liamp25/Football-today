<?php

// Get User's Geolocation

function get_local_time()
{

    $ip = $_SERVER['REMOTE_ADDR'];
    $url = 'http://ip-api.com/json/' . $ip;
    $tz = file_get_contents($url);
    if (json_decode($tz, true)['status'] && json_decode($tz, true)['status'] == "fail") {
        $tz = "Asia/Colombo";
    } else {
        $tz = json_decode($tz, true)['timezone'];
    }

    return $tz;
}


if (!function_exists("get_score")) {
    function get_score($homeOdd){
        $score = '';
        if($homeOdd >= 1 && $homeOdd < 1.2){
            $score = '5:1';
        }else if($homeOdd >= 1.2 && $homeOdd < 1.3){
            $score = '4:0';
        }
        else if($homeOdd >= 1.3 && $homeOdd < 1.4){
            $score = '3:1';
        }
        else if($homeOdd >= 1.4 && $homeOdd < 1.5){
            $score = '3:1';
        }
        else if($homeOdd >= 1.5 && $homeOdd < 1.6){
            $score = '3:0';
        }
        else if($homeOdd >= 1.6 && $homeOdd < 1.7){
            $score = '2:1';
        }
        else if($homeOdd >= 1.7 && $homeOdd < 1.9){
            $score = '1:0';
        }
        else if($homeOdd >= 1.9 && $homeOdd < 2.1){
            $score = '2:0';
        }
        else if($homeOdd >= 2.1 && $homeOdd < 2.3){
            $score = '2:1';
        }
        else if($homeOdd >= 2.3 && $homeOdd < 2.6){
            $score = '1:1';
        }
        else if($homeOdd >= 2.6 && $homeOdd < 3){
            $score = '1:1';
        }
        else if($homeOdd >= 3 && $homeOdd < 3.2){
            $score = '1:2';
        }
        else if($homeOdd >= 3.2 && $homeOdd < 3.6){
            $score = '2:2';
        }else if($homeOdd >= 3.6 && $homeOdd < 4){
            $score = '0:1';
        }else if($homeOdd >= 4 && $homeOdd < 4.5){
            $score = '2:2';
        }
        else if($homeOdd >= 4.5 && $homeOdd < 5){
            $score = '0:2';
        }
        else if($homeOdd >= 5 && $homeOdd < 5.5){
            $score = '2:3';
        }
        else if($homeOdd >= 5.5 && $homeOdd < 6){
            $score = '1:3';
        }
        else if($homeOdd >= 6 && $homeOdd < 6.5){
            $score = '2:4';
        }
        else if($homeOdd >= 6.5 && $homeOdd < 7){
            $score = '1:4';
        }
        else if($homeOdd >= 7 && $homeOdd < 7.5){
            $score = '0:4';
        }
        else if($homeOdd >= 7.5 && $homeOdd < 8){
            $score = '1:3';
        }
        else if($homeOdd >= 8 && $homeOdd < 8.5){
            $score = '0:3';
        }
        else if($homeOdd >= 8.5 && $homeOdd < 9){
            $score = '1:3';
        }
        else if($homeOdd >= 9 && $homeOdd < 9.5){
            $score = '0:3';
        }
        else if($homeOdd >= 9.5 && $homeOdd < 10){
            $score = '1:4';
        }else if($homeOdd >= 10){
            $score = '1:5';
        }

        return $score;
    }
}


if(!function_exists('get_btts_yes')){
    function get_btts_yes($score){
        $btts_yes_array = [
            "1:0" => 30,
            "2:0" => 40,
            "3:0" => 50,
            "4:0" => 50,
            "5:0" => 55,
            "6:0" => 55,
            "2:1" => 50,
            "3:1" => 55,
            "4:1" => 60,
            "5:1" => 60,
            "6:1" => 60,
            "3:2" => 70,
            "4:2" => 75,
            "5:2" => 75,
            "6:2" => 80,
            "4:3" => 80,
            "5:3" => 80,
            "6:3" => 80,
            "5:4" => 80,
            "6:4" => 90,
            "6:5" => 90,
            "0:0" => 25,
            "1:1" => 50,
            "2:2" => 60,
            "3:3" => 70,
            "4:4" => 80,
            "5:5" => 80,
            "0:1" => 30,
            "0:2" => 35,
            "0:3" => 50,
            "0:4" => 60,
            "0:5" => 60,
            "1:2" => 50,
            "1:3" => 60,
            "1:4" => 65,
            "1:5" => 65,
            "2:3" => 70,
            "2:4" => 70,
            "2:5" => 75,
            "3:4" => 80,
        ];
        $btts_yes = $btts_yes_array[$score];

        return $btts_yes;
    }
}


if(!function_exists('get_btts_no')){
    function get_btts_no($score){

        $btts_no_array = [
            "1:0" => 70,
            "2:0" => 60,
            "3:0" => 50,
            "4:0" => 50,
            "5:0" => 45,
            "6:0" => 45,
            "2:1" => 50,
            "3:1" => 45,
            "4:1" => 40,
            "5:1" => 40,
            "6:1" => 40,
            "3:2" => 30,
            "4:2" => 25,
            "5:2" => 25,
            "6:2" => 20,
            "4:3" => 20,
            "5:3" => 20,
            "6:3" => 20,
            "5:4" => 20,
            "6:4" => 10,
            "6:5" => 10,
            "0:0" => 75,
            "1:1" => 50,
            "2:2" => 40,
            "3:3" => 30,
            "4:4" => 20,
            "5:5" => 20,
            "0:1" => 70,
            "0:2" => 65,
            "0:3" => 50,
            "0:4" => 40,
            "0:5" => 40,
            "1:2" => 50,
            "1:3" => 40,
            "1:4" => 35,
            "1:5" => 35,
            "2:3" => 30,
            "2:4" => 30,
            "2:5" => 25,
            "3:4" => 20,
        ];
        $btts_no = $btts_no_array[$score];

        return $btts_no;
    }
}


if(!function_exists('get_u25')){
    function get_u25($score){

        $u25_array = [
            "1:0" => 70,
            "2:0" => 60,
            "3:0" => 50,
            "4:0" => 40,
            "5:0" => 35,
            "6:0" => 30,
            "2:1" => 50,
            "3:1" => 40,
            "4:1" => 35,
            "5:1" => 30,
            "6:1" => 25,
            "3:2" => 25,
            "4:2" => 25,
            "5:2" => 25,
            "6:2" => 20,
            "4:3" => 20,
            "5:3" => 20,
            "6:3" => 20,
            "5:4" => 20,
            "6:4" => 10,
            "6:5" => 10,
            "0:0" => 75,
            "1:1" => 60,
            "2:2" => 40,
            "3:3" => 30,
            "4:4" => 20,
            "5:5" => 20,
            "0:1" => 70,
            "0:2" => 65,
            "0:3" => 50,
            "0:4" => 40,
            "0:5" => 35,
            "1:2" => 50,
            "1:3" => 40,
            "1:4" => 35,
            "1:5" => 30,
            "2:3" => 30,
            "2:4" => 30,
            "2:5" => 25,
            "3:4" => 20,
        ];
        $u25 = $u25_array[$score];

        return $u25;
    }
}

if(!function_exists('get_o25')){

    function get_o25($score){

        $o25_array = [
            "1:0" => 30,
            "2:0" => 40,
            "3:0" => 50,
            "4:0" => 60,
            "5:0" => 65,
            "6:0" => 70,
            "2:1" => 50,
            "3:1" => 60,
            "4:1" => 65,
            "5:1" => 70,
            "6:1" => 75,
            "3:2" => 75,
            "4:2" => 75,
            "5:2" => 75,
            "6:2" => 80,
            "4:3" => 80,
            "5:3" => 80,
            "6:3" => 80,
            "5:4" => 80,
            "6:4" => 90,
            "6:5" => 90,
            "0:0" => 25,
            "1:1" => 40,
            "2:2" => 60,
            "3:3" => 70,
            "4:4" => 80,
            "5:5" => 80,
            "0:1" => 30,
            "0:2" => 35,
            "0:3" => 50,
            "0:4" => 60,
            "0:5" => 65,
            "1:2" => 50,
            "1:3" => 60,
            "1:4" => 65,
            "1:5" => 70,
            "2:3" => 70,
            "2:4" => 70,
            "2:5" => 75,
            "3:4" => 80,
        ];

        $o25 = $o25_array[$score];

        return $o25;
    }

}
