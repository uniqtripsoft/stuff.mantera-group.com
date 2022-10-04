$(document).ready(function(){
   
    const places = [
        {
            id: 1,
            // city: 'Санкт-Петербург',
            // Игорная зона «Красная поляна»
            coord: [43.685164, 40.253427],
            filials: [
                { 
                    id: 1,
                    coord: [40.253427, 43.685164],
                    name: 'RED ARENA',
                    title: 'RED ARENA',
                    address: 'ул. Эстонская, 51', 
                    discount: '20%'
                },
                { 
                    id: 2,
                    coord: [40.255333, 43.684425],
                    name: 'Ресторан Brunello',
                    title: 'Академия райдеров',
                    address: 'ул. Эстонская, 51', 
                    discount: '20%'
                },
                { 
                    id: 3,
                    coord: [40.25473, 43.684267],
                    name: 'Ресторан Баффет',
                    title: 'Ресторан Баффет',
                    address: 'Адрес: ул. Эстонская, 51', 
                    discount: '20%'
                },
            ]
        }, 
    ];
 
    const mapYandex = new YandexMap('map', {
        data: places,
        centerMap: [40.253427, 43.685164],
    });    

});  