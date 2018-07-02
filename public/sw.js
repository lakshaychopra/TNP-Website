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

importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.1/workbox-sw.js");

/**
 * The workboxSW.precacheAndRoute() method efficiently caches and responds to
 * requests for URLs in the manifest.
 * See https://goo.gl/S9QRab
 */
self.__precacheManifest = [
  {
    "url": "css/app.css",
    "revision": "216559bedabc0febb747548760948302"
  },
  {
    "url": "css/style.css",
    "revision": "c60bd58fa48260a8875b72ea1be39434"
  },
  {
    "url": "js/app.js",
    "revision": "0c07fe81653dcd60c9ad04ebc46d21fe"
  },
  {
    "url": "js/bundle.min.js",
    "revision": "065601df6ce94497e95760e62fd73041"
  },
  {
    "url": "manifest.json",
    "revision": "e3bd2421522fe89595500c0f3c74dc77"
  },
  {
    "url": "mix-manifest.json",
    "revision": "55cee1fa25e0c158c2bff790b320a331"
  }
].concat(self.__precacheManifest || []);
workbox.precaching.suppressWarnings();
workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
