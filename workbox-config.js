module.exports = {
    "globDirectory": "public/",
    "globPatterns": [
        "**/*.{json,ico,php,html}",
        "**/offline.png"
    ],
    "swDest": "public\\sw.js",
    "swSrc": "sw-base.js",
    "globIgnores": [
        '**/bundle.min.js',
        '**/mix-manifest.json',
        '**/style.css'
    ]
};