<?php

if (! function_exists('avg_read_time')) {
    function avg_read_time($content)
    {
        $word_num = str_word_count(strip_tags($content)) ;
        $avg_time = 120;
        $seconds = floor( (int) $word_num / (int) $avg_time ) * 60;
        $minutes = floor( $seconds / 60 );
        return ( $minutes < 1 )  ? "Less than 1 minute read" : $minutes." min read";
    }
}


