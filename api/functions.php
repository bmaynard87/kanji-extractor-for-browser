<?php

function is_kanji($char) {
    if(preg_match("/\p{Han}+/u", $char)) {
        return true;
    }

    return false;
}