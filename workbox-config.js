module.exports = {
    "globDirectory": "public/",
    "globPatterns": [
        "**/*.{json,ico,html}",
        "**/offline.png"
    ],
    "swDest": "public\\sw.js",
    "swSrc": "sw-base.js",
    "globIgnores": [
        '**/mix-manifest.json',
    ]
};