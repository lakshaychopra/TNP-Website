importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

workbox.precaching.precacheAndRoute([
  {
    "url": "css/app.css",
    "revision": "6186a199ef1809d82b0f0aa212cfd676"
  },
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
    "revision": "387b9e384891cab8f0454b4729543487"
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