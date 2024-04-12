export default class MapComponent {

    constructor(element)
    {
        this.element = element;
        this.element.classList.add('map--interactive');
        this.addresses = this.getAddresses();
        this.map = this.initMap(this.addresses[0]);
        this.placeMarkers();
    }

    getAddresses()
    {
        let addresses = [], address,
            elements = this.element.querySelectorAll('.map__location');

        for (var i = 0; i < elements.length; i++) {
            address = {};
            address.element = elements[i];
            address.title = elements[i].querySelector('.map__name').textContent;
            address.lat = parseFloat(elements[i].getAttribute('data-lat'));
            address.lng = parseFloat(elements[i].getAttribute('data-lng'));
            address.isShown = false;

            elements[i].removeAttribute('data-lat');
            elements[i].removeAttribute('data-lng');

            addresses.push(address);
        }

        return addresses;
    }

    initMap(address)
    {
        let container = this.element.querySelector('.map__app');

        return new window.google.maps.Map(container, {
            center: { lat: address.lat, lng: address.lng },
            disableDefaultUI: true,
            zoom: 12,
            styles: [{"elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#f5f5f2"},{"visibility":"on"}]},{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#ffffff"},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"visibility":"simplified"},{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#71c8d4"}]},{"featureType":"landscape","stylers":[{"color":"#e5e8e7"}]},{"featureType":"poi.park","stylers":[{"color":"#8ba129"}]},{"featureType":"road","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.sports_complex","elementType":"geometry","stylers":[{"color":"#c7c7c7"},{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#a0d3d3"}]},{"featureType":"poi.park","stylers":[{"color":"#91b65d"}]},{"featureType":"poi.park","stylers":[{"gamma":1.51}]},{"featureType":"road.local","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","stylers":[{"visibility":"simplified"}]},{"featureType":"road"},{"featureType":"road"},{},{"featureType":"road.highway"}]
        });
    }

    placeMarkers()
    {
        for (var i = this.addresses.length - 1; i >= 0; i--) {
            this.addresses[i].marker = new window.google.maps.Marker({
                map: this.map,
                position: { lat: this.addresses[i].lat, lng: this.addresses[i].lng },
                title: this.addresses[i].title,
            });

            this.addresses[i].marker.addListener('click', ((address) => (event) => this.clickMarker(address, event))(this.addresses[i]));
        }
    }

    clickMarker(address, event)
    {
        for (var i = this.addresses.length - 1; i >= 0; i--) {
            if(this.addresses[i] === address) continue;
            this.hideAddress(this.addresses[i]);
        }

        if(address.isShown) {
            this.hideAddress(address);
        } else {
            this.showAddress(address);
        }
    }

    showAddress(address)
    {
        if(address.isShown) return;

        address.element.classList.add('map__location--show');
        address.isShown = true;
    }

    hideAddress(address)
    {
        if(! address.isShown) return;

        address.element.classList.remove('map__location--show');
        address.isShown = false;
    } 

}