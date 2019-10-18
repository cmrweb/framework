const assets=[
    '.'
];
self.addEventListener('install',async event =>{
    const cache = await caches.open('files');
    cache.addAll(assets);
});
self.addEventListener('fetch', event =>{
    const req = event.request;
    event.respondWith(fileCache(req));
    if ( event.request.url.indexOf( '/chat' ) !== -1 ) {
        return false;
    }
});
async function fileCache(req){
    const cachedResponse = await caches.match(req);
    return cachedResponse || fetch(req);
}