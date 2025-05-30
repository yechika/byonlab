<?php
if (!function_exists('lang')) {
    function lang($id, $en) {
        return session('lang', 'id') === 'en' ? $id : $en;
    }
}