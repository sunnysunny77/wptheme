
if ("serviceWorker" in navigator) {

    navigator.serviceWorker.register(`${pwa_object.root}/worker.js`, {scope: "/"}).then((registration) => {
    console.log("Service worker registration succeeded:", registration);
  }).catch((error) => {

    console.error(`Service worker registration failed: ${error}`);
  });
} else {
  
  console.error("Service workers are not supported.");
}