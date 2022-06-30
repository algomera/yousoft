window._ = require('lodash');

import Alpine from 'alpinejs'
import mask from '@alpinejs/mask'
import collapse from '@alpinejs/collapse'
import Tooltip from "@ryangjchandler/alpine-tooltip";

Alpine.plugin(mask)
Alpine.plugin(collapse);
Alpine.plugin(Tooltip)
window.Alpine = Alpine
Alpine.start()