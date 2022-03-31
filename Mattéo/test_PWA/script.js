if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker
      .register('/sw.js')
      .then(registration => {
        console.log(
          `Service Worker enregistré ! Ressource: ${registration.scope}`
        );
      })
      .catch(err => {
        console.log(
          `Echec de l'enregistrement du Service Worker: ${err}`
        );
      });
  });
}