<?php
function removeWords($q, $s, $e) {
    $q = "XX" . $q;
    $startDel = strpos($q, $s);
    $endDel = strpos($q, $e);
    $subNum = array(
        "一",
        "二",
        "三",
        "四",
        "五",
        "六",
        "七",
        "八",
        "九",
    );
    $lang = $endDel - $startDel;
    if ($startDel && $endDel) {
        $del = mb_substr($q, $startDel, $lang);
    } elseif ($endDel) {
        $del = mb_substr($q, $endDel - 2, 2);
        $haveNum = preg_replace('/\D/s', '', $del);
        if ($haveNum) {
            if (!is_numeric($del)) {
                $del = preg_replace('/\D/s', '', $del);
            }
        } else {
            $del = mb_substr($q, $endDel - 6, 6);
            if (mb_substr($del, 0, 3) == "十") {
                $str = mb_substr($q, $endDel - 9, 3);
                foreach ($subNum as $v) {
                    if ($str == $v) {
                        $del = mb_substr($q, $endDel - 9, 9);
                    }
                }
            } else {
                $str = mb_substr($q, $endDel - 6, 3);
                foreach ($subNum as $v) {
                    if ($str == $v) {
                        $del = mb_substr($q, $endDel - 6, 6);
                        $pass = 1;
                    }
                }
                if ($pass != 1) {
                    $del = mb_substr($q, $endDel - 3, 3);
                }
            }
        }
    }
    return $del . $e;
}