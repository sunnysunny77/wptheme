const version = 1;
const cacheName = `wptheme-v${version}`;

const cacheAssets = [
  "./assets/css/app.min.css",
  "./assets/js/app.min.js"
];

self.addEventListener("install", (event) => {
  console.log("Service worker is installed");

  event.waitUntil(
    caches
      .open(cacheName)
      .then((cache) => {
        console.log("Caching assets");
        cache.addAll(cacheAssets);
      })
      .then(() => self.skipWaiting())
  );
});

self.addEventListener("fetch", (event) => {
  console.log("Fetching via Service worker");

  if (event.request.url.match(/wp-admin/) || event.request.url.match(/preview=true/)) {
    return;
  }

  event.respondWith(
    fetch(event.request)
      .then((networkResponse) => {
        return caches.open(cacheName).then((cache) => {
          cache.put(event.request, networkResponse.clone());
          return networkResponse;
        });
      })
      .catch(() => {
        return caches.match(event.request);
      })
  );
});