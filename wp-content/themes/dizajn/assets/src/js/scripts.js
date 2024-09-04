"use strict";

import {initHeader} from "./components/header";
import {initTabs} from "./components/tabs";
import {initSliders} from "./components/sliders";
import {initInteractions} from "./components/interactions";
import {initCookieNotice} from "./components/cookie-notice";

document.addEventListener('DOMContentLoaded', function() {

    initHeader();
    initTabs();
    initSliders();
    initInteractions()
    initCookieNotice();

});
