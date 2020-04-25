<?php

if (! function_exists('avg_read_time')) {
    function avg_read_time($content)
    {
        $word_num = str_word_count(strip_tags($content)) ;
        $avg_time = 150;

        $seconds = floor( (int) $word_num / (int) $avg_time ) * 60;
        $minutes = floor( $seconds / 60 );

        $default_string = "Less than 1 minute read";
        $concat_string = $minutes." minute".($minutes > 1) ? 's' : ''." read";

        return ( $minutes < 1 )  ? $default_string : $concat_string;
    }
}

if (! function_exists('avg_read_time_in_detail')) {
    function avg_read_time_in_detail($content)
    {
        $word_num = str_word_count(strip_tags($content));
        // avg  word read by human in minute by irisreading.com
        // we'll have to read 200 to 250 words per minute
        $avg_read_time = 200;

        $minute = floor($word_num / $avg_read_time);
        $second = floor($word_num % $avg_read_time / ($avg_read_time / 60));

        return $minute . ' minute' . ($minute == 1 ? '' : 's') .
            ', ' . $second . ' second' . ($second == 1 ? '' : 's') . ' read';
    }
}


/**
 * @param $money
 * @return string formatted_money
 */
if (! function_exists('format_money')) {
    function format_money($money)
    {
        $format_money = number_format(
            $money
            // $currency->precision,
            // $currency->decimal_separator,
            // $currency->thousand_separator
        );

        return '<span style="font-family: DejaVu Sans, serif;">Rp. </span>' . $format_money;
    }
}
