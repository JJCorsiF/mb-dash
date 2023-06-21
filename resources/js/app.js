import './bootstrap';

import focus from '@alpinejs/focus';
import Alpine from 'alpinejs';
Alpine.plugin(focus);
window.Alpine = Alpine;

// require('./vendor/livewire-ui/modal');
// require('../../vendor/livewire-ui/modal/resources/js/modal');

import * as bootstrap from 'bootstrap';
import { Toast } from 'bootstrap.esm.min.js'
Array.from(document.querySelectorAll('.toast'))
    .forEach(toastNode => new Toast(toastNode));
// import * as Popper from "@popperjs/core";

import Chart from 'chart.js/auto';
window.Chart = Chart;

import Sortable from 'sortablejs/modular/sortable.complete.esm.js';
window.Sortable = Sortable;

Alpine.start();
