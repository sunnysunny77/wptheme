const version = "v1";

self.addEventListener("install", function(event) {

  event.waitUntil(
    caches.open(version).then(function(cache) {
      return cache.addAll([
        "/index.php",
        "/index.php/example",
        "/wp-content/themes/wptheme-main/assets/js/app.min.js",
        "/wp-content/themes/wptheme-main/assets/css/app.min.css"
      ]);
    })
  );
});

self.addEventListener("fetch", event => {

  event.respondWith(caches.open("v1").then((cache) => {

    return fetch(event.request).then((networkResponse) => {

      cache.put(event.request, networkResponse.clone());

      return networkResponse;
    }).catch(() => {

      return caches.match(event.request);
    });
  }));
});