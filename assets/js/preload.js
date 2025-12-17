const preload = (href, as) => {
  const preloadLink = document.createElement("link");
  preloadLink.href = href;
  preloadLink.rel = "preload";
  preloadLink.as = as;
  if (as === "font") {
    preloadLink.crossOrigin = "true";
  }
  document.head.appendChild(preloadLink);
};

const fonts = [
  "/font/Poppins-Black.ttf",
  "/font/Poppins-Bold.ttf",
  "/font/Poppins-ExtraBold.ttf",
  "/font/Poppins-ExtraLight.ttf",
  "/font/Poppins-Light.ttf",
  "/font/Poppins-Medium.ttf",
  "/font/Poppins-Regular.ttf",
  "/font/Poppins-SemiBold.ttf",
  "/font/Poppins-Thin.ttf",
  "/webfonts/fa-regular-400.woff2",
  "/webfonts/fa-brands-400.woff2",
  "/webfonts/fa-solid-900.woff2"
];

for (const index of fonts) {

  preload(`${preload_object.root}${index}`, "font");
}
