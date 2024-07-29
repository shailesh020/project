<?php

if (! function_exists('activePage')) {
    function activePage($route_name) {
        return request()->routeIs($route_name) ? 'active' : '';
    }
}
if (! function_exists('collapseMenu')) {
    function collapseMenu($route_name) {
        return request()->routeIs($route_name) ? 'active show' : '';
    }
}
