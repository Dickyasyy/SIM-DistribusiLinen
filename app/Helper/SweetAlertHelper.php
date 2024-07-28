<?php

if (!function_exists('alert')) {
    function alert($type, $message, $title = null)
    {
        $title = $title ?: ucfirst($type);
        session()->flash('alert-type', $type);
        session()->flash('alert-message', $message);
        session()->flash('alert-title', $title);
    }
}
