const version = "v1";

const addResourcesToCache = async (resources) => {

  const cache = await caches.open(version);
  await cache.addAll(resources);
};

self.addEventListener("install", (event) => {

  console.log(`${version} installing...`);

  event.waitUntil(
    addResourcesToCache([
      "/index.php",
      "/index.php/example",
      "/wp-content/themes/wptheme-main/assets/js/app.min.js",
      "/wp-content/themes/wptheme-main/assets/css/app.min.css"
    ])
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