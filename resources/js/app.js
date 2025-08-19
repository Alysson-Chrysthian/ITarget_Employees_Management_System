import Inputmask from 'inputmask';
import './bootstrap';

document.addEventListener('DOMContentLoaded', (e) => {
    Inputmask().mask(document.querySelectorAll('input'));
});