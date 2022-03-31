const assets = [
  // "./index.php",
  // "./home.php",
  // "./aboutUsPage.php",
  // "./applyPage.php",
  // "./commingSoonPage.html",
  // "./companyPage.php",
  // "./createCompany.php",
  // "./createOffice.php",
  // "./createProfile.php",
  // "./DataBaseConnection.php",
  // "./disconnect.php",
  // "./footer.php",
  // "./listSuppCompany.php",
  // "./listSuppOffer.php",
  // "./listSuppOffice.php",
  // "./listSuppProfile.php",
  // "./navbar.php",
  // "./suppOffer.php",
  // "./suppOffice.php",
  // "./suppProfile.php",
  // "./suppCompany.php",
  // "./wishlistPage.php",
  // "./manifest.json",
  // "./sw.js",
  // "./js/index.js",
  // "./js/js.js",
  // "./js/script_CreateProfile.js"
];

self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open("static").then((cache) => {
      return cache.addAll(assets);
    })
  );
});

self.addEventListener("fetch", function(event) {
  event.respondWith(
    caches.match(event.request).then((response) => {
      return response || fetch(event.request);
    })
  );
});