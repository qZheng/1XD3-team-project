// Initial map load
window.onload = function() {
    updateMap('McMaster+University,Hamilton+ON');
};

function updateMap(location) {
    const apiKey = 'xxx'
    const mapHtml = `
        <div>
            <iframe
                width="600"
                height="450"
                style="border:0"
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed/v1/place?key=${apiKey}&q=${location}">
            </iframe>
        </div>
    `;
    
    document.getElementById('mapContainer').innerHTML = mapHtml;
}