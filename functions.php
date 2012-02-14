<?php

function _get($v) {
    if (isset($_GET[$v])) {
        return $_GET[$v];
    }
    return null;
}

