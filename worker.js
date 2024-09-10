const version = "v1";

const addResourcesToCache = async (resources) => {
  
  const cache = await caches.open(version);
  await cache.addAll(resources);
};

self.addEventListener("install", (event) => {

  console.log(`${version} installing...`);

  event.waitUntil(
    addResourcesToCache([

      "./assets/css/app.min.css",
      "./assets/js/app.min.js"
    ])
  );
});

self.addEventListener("fetch", (event) => {
    console.log("Fetching via Service worker");
  
    event.respondWith(
      fetch(event.request)
        .then((networkResponse) => {
          return caches.open(version).then((cache) => {
            cache.put(event.request, networkResponse.clone());
            return networkResponse;
          });
        })
        .catch(() => {
          return caches.match(event.request);
        })
    );
  });