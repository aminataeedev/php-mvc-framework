<?php

function site_url($route) {
    return $_ENV['DOMAIN'].$route;
}

function asset_url($route) {
    return site_url('/Assets').$route;
}