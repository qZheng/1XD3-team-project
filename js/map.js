window.onload = function() {
    updateMap('Caroline+Place+Retirement+Residence,+Hamilton,+ON');
    
    document.querySelectorAll('.tile').forEach(tile => {
        tile.addEventListener('click', function() {
            const locationName = this.querySelector('h2').textContent;
            
            switch(locationName) {
                case 'Caroline Place':
                    updateMap('Caroline+Place+Retirement+Residence,+Hamilton,+ON');
                    break;
                case 'Community Living Hamilton':
                    updateMap('Community+Living+Hamilton,+Hamilton,+ON');
                    break;
                case 'Shalom Village':
                    updateMap('Shalom+Village,+Hamilton,+ON');
                    break;
                default:
                    updateMap('McMaster+University,Hamilton+ON');
            }
        });
    });
};

function updateMap(location) {
    const apiKey = 'AIzaSyBL-DlFXUL4sxfoWCNdHkYnvoARe70k7Zo';
    const mapHtml = `
        <iframe
            width="600"
            height="450"
            style="border:0"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed/v1/place?key=${apiKey}&q=${location}">
        </iframe>
    `;
    
    document.getElementById('map').innerHTML = mapHtml;
}
