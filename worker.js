const version = 1;
const cacheName = `wptheme-v${version}`;

const resources = [
  "/",
  "./assets/css/app.min.css",
  "./assets/css/app.min.css.map",
  "./assets/css/fallback.css",
  "./assets/js/app.min.js",
  "./assets/js/app.min.js.map",
  "./assets/js/preload.js",
  "./assets/js/fallback.js",
  "./assets/js/service-worker.js",
  "./assets/images/pwa-logo-small.webp",
  "./assets/font/Poppins-Black.ttf",
  "./assets/font/Poppins-Bold.ttf",
  "./assets/font/Poppins-ExtraBold.ttf",
  "./assets/font/Poppins-ExtraLight.ttf",
  "./assets/font/Poppins-Light.ttf",
  "./assets/font/Poppins-Medium.ttf",
  "./assets/font/Poppins-Regular.ttf",
  "./assets/font/Poppins-SemiBold.ttf",
  "./assets/font/Poppins-Thin.ttf",
  "./assets/webfonts/fa-regular-400.woff2",
  "./assets/webfonts/fa-brands-400.woff2",
  "./assets/webfonts/fa-solid-900.woff2",
  "./favicon.ico",  
  "./manifest.json",  
  "./fallback.php"
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

const cache = async (req, res) => {

  const cache = await caches.open(cacheName);
  await cache.put(req, res);
};

const first = async (req) => {

  try {

    const res = await fetch(req);

    cache(req, res.clone());

    return res;

  } catch (error) {

    console.log(error);

    const cache = await caches.match(req);

    if (cache) {

      return cache;
    }

    if (req.mode === "navigate") {

      const fallback = await caches.match("./fallback.php");

      if (fallback) {

        return fallback;
      }

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