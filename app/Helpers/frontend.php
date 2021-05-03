<?php
\Html::macro('smartNav', function($url, $title){
    $class = $url == request()->url() ? 'active' : '';
    return "<li class=\"nav-link $class\"><a href=\"$url\">$title</a></li>";
});