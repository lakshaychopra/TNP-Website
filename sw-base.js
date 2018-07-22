importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

workbox.precaching.precacheAndRoute([]);

workbox.routing.registerRoute(
    'http://localhost:8000/js/bundle.min.js',
    workbox.strategies.staleWhileRevalidate({
        cacheName: 'static-js',
    }),
);

workbox.routing.registerRoute(
    'http://localhost:8000/css/style.css',
    workbox.strategies.staleWhileRevalidate({
        cacheName: 'static-css',
    }),
);