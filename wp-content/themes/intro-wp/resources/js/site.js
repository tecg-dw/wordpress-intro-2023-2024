import Map from "./components/Map";
import Quicksearch from "./components/Quicksearch";

class Site {

    constructor() {
        this.quicksearch = new Quicksearch();
        this.maps = [];
        this.initMaps();
    }

    initMaps() {
        let maps = document.querySelectorAll('.map');

        (async () => {
            await window.google.maps.importLibrary("maps");
            await window.google.maps.importLibrary("marker");
        })().then(() => {
            let instances = [];

            for (var i = 0; i < maps.length; i++) {
                instances.push(new Map(maps[i]));
            }

            this.maps = instances;
        });
    }

};

window.addEventListener('load', () => window.site = new Site());