importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

console.log('this is my custom service worker');
workbox.precaching.precacheAndRoute([
  {
    "url": "css/style.css",
    "revision": "b9994b277b2646f6dfce4c9ebc5baedf"
  },
  {
    "url": "favicon.ico",
    "revision": "ac29a51f219ca1c52ca4e2c58745361b"
  },
  {
    "url": "js/bundle.min.js",
    "revision": "7041a65e136711b60178bd5bbe8e7285"
  },
  {
    "url": "manifest.json",
    "revision": "ff51dc6eb5255f82a99a5e95276f9e6e"
  },
  {
    "url": "service-worker.js",
    "revision": "36bbcb5172544518dcf601687586837f"
  }
]);