importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

workbox.precaching.precacheAndRoute([
  {
    "url": "favicon.ico",
    "revision": "ac29a51f219ca1c52ca4e2c58745361b"
  },
  {
    "url": "offline.html",
    "revision": "3cc36411bf6e69db7f8ad365381ee1c3"
  },
  {
    "url": "offline.png",
    "revision": "a62ebdc11693964198bc54c92521f35c"
  },
  {
    "url": "manifest.webmanifest",
    "revision": "81ae69ddf37a24eecfcbabb9baa685e3"
  }
]);

workbox.googleAnalytics.initialize();

const OFFLINE_URL = 'https://www.tnpgndec.com/offline.html';
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

workbox.routing.registerRoute(
    new RegExp('https://fonts.(?:googleapis|gstatic).com/(.*)'),
    workbox.strategies.cacheFirst({
        cacheName: 'google-fonts',
        plugins: [
            new workbox.expiration.Plugin({
                maxEntries: 30,
            }),
            new workbox.cacheableResponse.Plugin({
                statuses: [0, 200]
            }),
        ],
    }),
);

workbox.routing.registerRoute(
    new RegExp('/js/bundle.min.js'),
    workbox.strategies.staleWhileRevalidate({
        cacheName: 'static1',
    }),
);
workbox.routing.registerRoute(
    new RegExp('/css/style.css'),
    workbox.strategies.staleWhileRevalidate({
        cacheName: 'static2',
    }),
);