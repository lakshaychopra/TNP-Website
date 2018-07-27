module.exports = {
    "globDirectory": "public/",
    "globPatterns": [
        "**/*.{ico,html}",
        "**/offline.png",
        "**/manifest.webmanifest"
    ],
    "swDest": "public\\sw.js",
    "swSrc": "sw-base.js",
};