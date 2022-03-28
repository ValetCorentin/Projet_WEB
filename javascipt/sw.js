self.addEventListener("install", e => {
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll(["./index.html", "./assets/pp/Coco.png", "./assets/pp/Odric.png", "./assets/pp/M.png", "./assets/pp/matteo.png","./assets/pp/Olivier.png", "./style.css"]);
        })
    );
});

// self.addEventListener("fetch", e => { 
//     console.log('Intercepting fetch request for: ${e.request.url}');
// });


    self.addEventListener("fetch", e => {
        // console.log('Intercepting fetch request for: ${e.request.url}');
        e.respondWith(
            caches.match(e.request).then(response => {
                return response || fetch(e.request);
            } )
        );
    });