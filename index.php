<?php

    $string = "z<*zj";
    $answer = "j<*zz";

    $string2 = "ab-cd";
    $answer2 = "dc-ba";

    $string3 = "jb!uyi^ja";
    $answer3 = "aj!iyu^bj";

    function reverseStringOnly($s){
        $charArr = [];
        $alpArr = [];
        foreach(str_split($s) as $key => $str){
            if(ctype_alpha($str)){
                $alpArr[] = $str;
            }else{
                $charArr[$key] = $str;
            }
        }

        echo "\n";
        $alpArr = array_reverse($alpArr);
        $rangeArr = range(0, count(str_split($s)) - 1);
        $rangeArr = array_filter($rangeArr, function($elem) use ($charArr){
            return !array_key_exists($elem, $charArr);
        });
        foreach($alpArr as $value){
            foreach($rangeArr as $range){
                if(!isset($charArr[$range])){
                    $charArr[$range] = $value;
                    break;
                }
            }
        }
        ksort($charArr);
        return implode("", $charArr); 
    }
    echo $answer == reverseStringOnly($string) ? 'Success ' : 'Failed ';
    echo $answer2 == reverseStringOnly($string2) ? 'Success ' : 'Failed ';
    echo $answer3 == reverseStringOnly($string3) ? 'Success ' : 'Failed ';