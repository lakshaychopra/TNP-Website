importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

workbox.precaching.precacheAndRoute([
  {
    "url": "favicon.ico",
    "revision": "ac29a51f219ca1c52ca4e2c58745361b"
  },
  {
    "url": "offline.html",
    "revision": "9c67ce1d07e877034f2435babb54fcd4"
  },
  {
    "url": "offline.png",
    "revision": "a62ebdc11693964198bc54c92521f35c"
  }
]);

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