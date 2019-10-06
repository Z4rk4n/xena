<?php

class MsDebug
{

    /**
     * debug div style attr
     *
     * @var array
     */
    private static $stylesheet = [
        "background-color" => "black",
        "color" => "white",
        "font-family" => "monospace",
        "font-size" => "16px",
        "padding" => "6px",
        "border-radius" => "6px"
    ];

    /**
     * var_dump value with swag
     *
     * @param $value
     * @param bool $exit
     * @param bool $isHtml
     */
    public static function put($value, $exit = false, $isHtml = true)
    {
        if ($isHtml) {
            $openHtml = "<div style='%s'><pre>";
            $closeHtml = "</div></pre>";
            $styleProps = "";

            foreach (self::$stylesheet as $attr => $style) {
                $styleProps .= sprintf("%s:%s;", $attr, $style);
            }

            echo sprintf($openHtml, $styleProps);
            var_dump($value);
            echo $closeHtml;
        } else {
            var_dump($value);
        }

        if ($exit) {
            exit;
        }
    }

}