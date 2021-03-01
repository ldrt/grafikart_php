<?php
/*
Form::select('name','value',[]);
self::$class;
*/
class Form {
    public static $class = "form-control";
    public static function select(string $name, $value, array $options) : string
    {
        $html_options = [];
        foreach ($options as $key => $option) {
            $attributes = $key == $value ? 'selected' : '';
            $html_options[] = "<option value='$key' $attributes>$option</option>";
        }
        $class = self::$class;
        return "<select name='$name' class='$class'>" . implode($html_options) . '</select>';
    }
}
?>