import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Importa Select2 CSS
import 'select2/dist/css/select2.min.css';

// Importa Select2 JS
import $ from 'jquery';
window.jQuery = $;
window.$ = $;
import 'select2';

// Inicializa Select2 para los selectores deseados
$(document).ready(function() {
    $('.select2').select2();
});
