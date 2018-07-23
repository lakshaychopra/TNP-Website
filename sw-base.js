importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

workbox.precaching.precacheAndRoute([]);

// workbox.routing.registerRoute(
//     'http://localhost:8000/js/bundle.min.js',
//     workbox.strategies.staleWhileRevalidate({
//         cacheName: 'static-js',
//     }),
// );

// workbox.routing.registerRoute(
//     'http://localhost:8000/css/style.css',
//     workbox.strategies.staleWhileRevalidate({
//         cacheName: 'static-css',
//     }),
// );

// workbox.routing.registerRoute(
//     '/',
//     workbox.strategies.cacheFirst({
//         cacheName: 'posts',
//         plugins: [
//             new workbox.expiration.Plugin({
//                 maxEntries: 50,
//                 maxAgeSeconds: 5 * 60, // 5 minutes
//             }),
//             new workbox.cacheableResponse.Plugin({
//                 statuses: [0, 200],
//             }),
//         ],
//     }),
// );

const OFFLINE_URL = 'http://localhost:8000/offline.html';
self.addEventListener('fetch', event => {
    if (event.request.mode === 'navigate' ||
        (event.request.method === 'GET' &&
            event.request.headers.get('accept').includes('text/html'))) {
        event.respondWith(
            fetch(event.request).catch(error => {
                return caches.match(OFFLINE_URL);
            })
        );
    }
});