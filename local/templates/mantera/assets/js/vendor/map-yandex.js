class YandexMap{
    constructor(selector, options) {
        this.selector = selector;
        this.options = options;
        this.data; 
        this.centerMap = options.centerMap;
        this.arrayPlaces = [];
        this.collection = {};  
        this.obYmaps = {};

        this.getData();
        this.render();
    }


    getData = () => {
        if (Array.isArray(this.options.data)) {
            this.data = this.options.data;
        } else {
            this.data = Object.values(this.options.data);
        }
    }

    render = () => {
        if (document.querySelector('#' + this.selector)) {
            const that = this;
            
            ymaps.ready(function() {
                that.obYmaps = new ymaps.Map(that.selector, {
                    center: that.centerMap,
                    zoom: 15
                });

                that.getArrayPlaces();
                that.createMarksGroup();
                that.RenderTabs();
                document.querySelector(".tabs-promo__nav-btn:nth-child(1)").click();
            });
            
        }
    }

    getArrayPlaces = () => {
        this.arrayPlaces = [];

        this.data.map(item => {
            if (typeof(item.filials) === 'object') item.filials = Object.values(item.filials);
            
            item.filials.map(obj => {
                this.arrayPlaces.push(obj);
            });          
        });
    } 

    createMarksGroup() {
        this.collection = new ymaps.GeoObjectCollection(null);
        this.obYmaps.geoObjects.removeAll();
        this.obYmaps.geoObjects.add(this.collection);

        for (var i = 0; i < this.arrayPlaces.length; i++) {
            this.createMark(this.arrayPlaces[i]);
        }
    }

    createMark(item) {
        this.placemark = new ymaps.Placemark(item.coord, 
            { 
                iconCaption: item.name,
                balloonContentBody: 
                `
                    <p class="balloon-text">${item.name}</p>
                    <p class="balloon-text">${item.title}</p>
                    <p class="balloon-text">Скидка: ${item.discount}</p>
                    <p class="balloon-text">Адрес: ${item.address}</p>
                `
            }, 
            {
                preset: 'islands#yellowDotIcon',
                color: '#ff0000',
                iconImageSize: [30, 37],
            }
        );
        this.collection.add(this.placemark);
    }

    createArea = () => {
        this.arrayAreas = [];

        this.data.map(item => {
            item.areas.map(obj => {
                this.arrayAreas.push(obj);
                return null; 
            });          
        });

        let GeoObjectCollection = new ymaps.GeoObjectCollection({}, {
            preset: "islands#redCircleIcon",
            strokeWidth: 4,
            geodesic: true
        });

        for (var i = 0; i < this.arrayAreas.length; i++) {
            this.myGeoObject = new ymaps.GeoObject({
                geometry: {
                    type: "Polygon",
                    coordinates: this.arrayAreas[i].coord,
                    fillRule: "nonZero"
                },
                properties: {
                    balloonContent: "Многоугольник",
                }
            }, {
                fillColor: this.arrayAreas[i].fillColor,
                strokeColor: this.arrayAreas[i].strokeColor,
                opacity: 0.5,
                strokeWidth: 3,
                strokeStyle: 'solid'
            });

            GeoObjectCollection.add(this.myGeoObject);
        }
        this.obYmaps.geoObjects.add(GeoObjectCollection);
    } 

    createPolygon(item){
        let GeoObjectCollection = new ymaps.GeoObjectCollection({}, {
            preset: "islands#redCircleIcon",
            strokeWidth: 4,
            geodesic: true
        });

        for (var i = 0; i < item.el.length; i++) {
            this.myGeoObject = new ymaps.GeoObject({
                geometry: {
                    type: "Polygon",
                    coordinates: item.el[i].coord,
                    fillRule: "nonZero"
                },
                properties: {
                    balloonContent: item.name,
                }
            }, {
                fillColor: item.el[i].fillColor,
                strokeColor: item.el[i].strokeColor,
                opacity: 0.5,
                strokeWidth: 3,
                strokeStyle: 'solid'
            });

            GeoObjectCollection.add(this.myGeoObject);
        }
        this.obYmaps.geoObjects.add(GeoObjectCollection);
    }

    createPoint(item){
        this.collection = new ymaps.GeoObjectCollection(null);
        this.obYmaps.geoObjects.add(this.collection);

        for(let i = 0; i < item.length; i++){
            this.placemark = new ymaps.Placemark(item[i].coord, 
                { 
                    iconCaption: item[i].name.replace(/&quot;/g, '\"'),
                    balloonContentBody: 
                    `
                        <p class="balloon-text">${item[i].name}</p>
                        <p class="balloon-text">${item[i].title}</p>
                        <p class="balloon-text">Скидка: ${item[i].discount}</p>
                        <p class="balloon-text">Адрес: ${item[i].address}</p>
                    `
                }, 
                {
                    preset: 'islands#yellowDotIcon',
                    color: '#ff0000',
                    iconImageSize: [30, 37],
                }
            );
            this.collection.add(this.placemark);
        }
    }

    RenderTabs = () => {
        const tabsBtn = document.querySelectorAll(".tabs-promo__nav-btn");
        const that = this;

        tabsBtn.forEach(item => item.addEventListener("click", function() {
            if(typeof(that.obYmaps.geoObjects.removeAll) === "function"){
                that.obYmaps.geoObjects.removeAll();
            }
            let currentBtn = item;
            let tabId = currentBtn.getAttribute("data-tab-item");  

            this.ArrayTabsId = [];
            this.ArrayCenter = [];
            this.ArrayAreas = [];
            this.ArrayPoints = [];

            that.data.forEach(element => {
                // this.ArrayAreas.push(element.areas);
                this.ArrayAreas.push({el: element.areas, name: element.polygonName});
                this.ArrayPoints.push(element.filials);
                return null;
            });

            that.data.map(item => {
                this.ArrayTabsId.push(item.tabId);
                this.ArrayCenter.push(item.center);
                return null; 
            });
            
            for(let i = 0; i < this.ArrayTabsId.length; i++){
                
                if(tabId === '#tab_' + this.ArrayTabsId[i]){
                    that.obYmaps.setCenter(this.ArrayCenter[i]);
                    that.createPolygon(this.ArrayAreas[i]);
                    that.createPoint(this.ArrayPoints[i]);
                }
            }
            
        }));
    }

}