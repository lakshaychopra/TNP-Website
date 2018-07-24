module.exports = {
    "globDirectory": "public/",
    "globPatterns": [
        "**/*.{ico,html}",
        "**/offline.png",
        "**/manifest.json"
    ],
    "swDest": "public\\sw.js",
    "swSrc": "sw-base.js",
};