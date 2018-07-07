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
    "url": "css/app.css",
    "revision": "216559bedabc0febb747548760948302"
  },
  {
    "url": "css/style.css",
    "revision": "93f880bcb2bad0ff464cfd5ea81d068c"
  },
  {
    "url": "js/app.js",
    "revision": "639b9bc4eb7c733da86cd0ae3d390db6"
  },
  {
    "url": "js/bundle.min.js",
    "revision": "811696e40a759895cd9ee746a144dd8c"
  },
  {
    "url": "manifest.json",
    "revision": "0e7bc9758c96f1532f286382fdf16ffd"
  },
  {
    "url": "mix-manifest.json",
    "revision": "55cee1fa25e0c158c2bff790b320a331"
  }
].concat(self.__precacheManifest || []);
workbox.precaching.suppressWarnings();
workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
