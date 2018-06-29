module.exports = {
  "globDirectory": "public/",
  "globPatterns": [
    "**/*.{css,js,webmanifest}"
  ],
  "swDest": "public\\sw.js",
  // Increase the limit to 4mb:
"maximumFileSizeToCacheInBytes": 4 * 1024 * 1024
};