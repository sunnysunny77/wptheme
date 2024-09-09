const cacheName = "v1";
const assetsToCache = [
  "/",
  "/index.php",
  "/index.php/example",
  "/index.php/posts",
  "/wp-content/themes/wptheme-main/assets/js/app.min.js",
  "/wp-content/themes/wptheme-main/assets/css/app.min.css",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-Black.ttf",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-Bold.ttf",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-ExtraBold.ttf",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-ExtraLight.ttf",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-Light.ttf",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-Medium.ttf",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-Regular.ttf",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-SemiBold.ttf",
  "/wp-content/themes/wptheme-main/assets/font/Poppins-Thin.ttf",
  "/wp-content/themes/wptheme-main/assets/webfonts/fa-regular-400.woff2",
  "/wp-content/themes/wptheme-main/assets/webfonts/fa-brands-400.woff2",
  "/wp-content/themes/wptheme-main/assets/webfonts/fa-solid-900.woff2"
];

self.addEventListener("install", function(event) {
  event.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return cache.addAll(assetsToCache);
    })
  );
});

self.addEventListener("fetch", function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      if (response) {
        return response;
      }
      return fetch(event.request);
    })
  );
});