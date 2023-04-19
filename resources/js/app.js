import './bootstrap';
import Alpine from 'alpinejs';
import AlpineFloatingUI from '@awcodes/alpine-floating-ui'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'
import focus from '@alpinejs/focus';
import AOS from 'aos'
import QRCode from 'qrcode'
import intersect from '@alpinejs/intersect'
import swipePlugin from 'alpinejs-swipe'

 

window.QRCode = QRCode;
window.Alpine = Alpine;
AOS.init({
    once: true
});
  
Alpine.plugin(focus);
Alpine.plugin(AlpineFloatingUI)
Alpine.plugin(NotificationsAlpinePlugin)
Alpine.plugin(intersect)
Alpine.plugin(swipePlugin);
Alpine.start();
