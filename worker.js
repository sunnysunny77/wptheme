const version = 1;
const cacheName = `wptheme-v${version}`;

const resources = [
  "./assets/css/app.min.css",
  "./assets/js/app.min.js"
];

const installResources = async (resources) => {

  const cache = await caches.open(cacheName);
  await cache.addAll(resources);
};

self.addEventListener("install", (event) => {

  console.log("Service worker is installed");
  
  self.skipWaiting();

  event.waitUntil(installResources(resources));
});

const first = async (req) => {

  try {

    const res = await fetch(req);

    if (res) {

      const cache = await caches.open(cacheName);

      if (cache) {

        cache.put(req, res.clone());
      }

      return res;
    }

  } catch (error) {

    console.log(error);

    const cache = await caches.match(req);
      
    if (cache) {

      return cache;
    }

    return new Response("Network error happened", {
      status: 408,
      headers: { "Content-Type": "text/plain" },
    });
  }
};

self.addEventListener("fetch", (event) => {

  console.log("Fetching via Service worker");

  if (event.request.url.match(/wp-admin/) || event.request.url.match(/preview=true/)) {
    
    return;
  } else {
    
    event.respondWith(first(event.request));
  }
});