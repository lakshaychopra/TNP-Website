importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

workbox.precaching.precacheAndRoute([
  {
    "url": "favicon.ico",
    "revision": "ac29a51f219ca1c52ca4e2c58745361b"
  },
  {
    "url": "index.php",
    "revision": "b9901d13f00ef92e0793e2d9fcd57431"
  },
  {
    "url": "manifest.json",
    "revision": "fcfdf1a193c4f4a25eb49f17d9bcaf73"
  },
  {
    "url": "offline.html",
    "revision": "3228e231945b85e8b18496aa284c04fb"
  },
  {
    "url": "offline.png",
    "revision": "b5a77fe1d90718592d6428b7f5298df2"
  }
]);

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