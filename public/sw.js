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
    "url": "favicon.ico",
    "revision": "338abbb5ea8d80b9869555eca253d49d"
  },
  {
    "url": "fonts/vendor/element-ui/lib/theme-chalk/element-icons.ttf",
    "revision": "6f0a76321d30f3c8120915e57f7bd77e"
  },
  {
    "url": "fonts/vendor/element-ui/lib/theme-chalk/element-icons.woff",
    "revision": "2fad952a20fbbcfd1bf2ebb210dccf7a"
  },
  {
    "url": "fonts/vendor/font-awesome/fontawesome-webfont.eot",
    "revision": "674f50d287a8c48dc19ba404d20fe713"
  },
  {
    "url": "fonts/vendor/font-awesome/fontawesome-webfont.svg",
    "revision": "912ec66d7572ff821749319396470bde"
  },
  {
    "url": "fonts/vendor/font-awesome/fontawesome-webfont.ttf",
    "revision": "b06871f281fee6b241d60582ae9369b9"
  },
  {
    "url": "fonts/vendor/font-awesome/fontawesome-webfont.woff",
    "revision": "fee66e712a8a08eef5805a46892932ad"
  },
  {
    "url": "fonts/vendor/font-awesome/fontawesome-webfont.woff2",
    "revision": "af7ae505a9eed503f8b8e6982036873e"
  },
  {
    "url": "icon.png",
    "revision": "7676155efec287aaaa1b78ea9a79120d"
  },
  {
    "url": "images/1.jpg",
    "revision": "b129218ba1acc4dea54a75050587b15a"
  },
  {
    "url": "images/2.jpg",
    "revision": "dae34de0a23a9a43cc5aa3885e10fbc9"
  },
  {
    "url": "images/3.jpg",
    "revision": "53449fa87702af80374c45b87080c639"
  },
  {
    "url": "images/posts/images/post_b3s4ZsPzs1AGbToP.PNG",
    "revision": "69b59d41f36938837f3ca56e5079fb10"
  },
  {
    "url": "images/posts/images/post_MN0jFio63pxbziOW.PNG",
    "revision": "0e47bd87e4e36fdea4a1fcc5b69aae6d"
  },
  {
    "url": "images/posts/images/post_SkQq7qY2mJNMF64x.png",
    "revision": "39be9fb9319eb415d6736a8f0d36a87a"
  },
  {
    "url": "mix-manifest.json",
    "revision": "7a2650ab59828657c8c3563e60a57d79"
  },
  {
    "url": "site.webmanifest",
    "revision": "e3bd2421522fe89595500c0f3c74dc77"
  },
  {
    "url": "tile-wide.png",
    "revision": "8eec2319b4adbc36c1874f0ccaabc958"
  },
  {
    "url": "tile.png",
    "revision": "9bee3f492c17e9fecc3949397ba0e022"
  }
].concat(self.__precacheManifest || []);
workbox.precaching.suppressWarnings();
workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
