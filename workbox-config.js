module.exports = {
    "globDirectory": "public/",
    "globPatterns": [
        "**/*.{css,json,ico,php}",
    ],
    "swDest": "public\\sw.js",
    "swSrc": "sw-base.js",
    "globIgnores": [
        '**/bundle.min.js',
        '**/mix-manifest.json',
        '**/style.css'
    ]
};