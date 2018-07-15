/**
 * Welcome to your Workbox-powered service worker!
 *
 * You'll need to register this file in your web app and you should
 * disable HTTP caching for this file too.
 * See https://goo.gl/nhQhGp
 *
 * The rest of the code is auto-generated. Please don't update this file
 * directly; instead, make changes to your Workbox build configuration
 * and re-run your build process.
 * See https://goo.gl/2aRDsh
 */

importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

/**
 * The workboxSW.precacheAndRoute() method efficiently caches and responds to
 * requests for URLs in the manifest.
 * See https://goo.gl/S9QRab
 */
self.__precacheManifest = [
  {
    "url": "css/style.css",
    "revision": "b9994b277b2646f6dfce4c9ebc5baedf"
  },
  {
    "url": "index.php",
    "revision": "b9901d13f00ef92e0793e2d9fcd57431"
  },
  {
    "url": "js/bundle.min.js",
    "revision": "c3d41080d10114fbd5ab66fe9b9159d1"
  },
  {
    "url": "manifest.json",
    "revision": "2ae4ea7cc23eca4807eeb791924746fc"
  },
  {
    "url": "mix-manifest.json",
    "revision": "55cee1fa25e0c158c2bff790b320a331"
  },
  {
    "url": "service-worker.js",
    "revision": "36bbcb5172544518dcf601687586837f"
  },
  {
    "url": "web.config",
    "revision": "50e9a0f34b264670691691d406428d75"
  }
].concat(self.__precacheManifest || []);
workbox.precaching.suppressWarnings();
workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
