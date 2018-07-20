module.exports = {
    "globDirectory": "public/",
    "globPatterns": [
        "**/*.{css,js,json,ico}"
    ],
    "swDest": "public\\sw.js",
    "swSrc": "sw-base.js",
    "globIgnores": [
        '**/app.js',
        '**/app.css',
        '**/mix-manifest.json'
    ]
};