const assets=[
    './index.php',
    './asset/css/cmrstyle.css'

];
self.addEventListener('install',async event =>{
    const cache = await caches.open('files');
    cache.addAll(assets);
});
self.addEventListener('fetch', event =>{
    const req = event.request;
    event.respondWith(fileCache(req));
});
async function fileCache(req){
    const cachedResponse = await caches.match(req);
    return cachedResponse || fetch(req);
}