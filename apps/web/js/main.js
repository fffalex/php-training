$(function () { 
    $('#stat1').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Frutas mas consumidas'
        },
        xAxis: {
            categories: data.bar.categories
        },
        yAxis: {
            title: {
                text: 'Frutas Comidas'
            }
        },
        series: [{
            name: 'hola',
            data: 'chau'
        }, {
            name: 'hola de nuevo',
            data: 'chau again'
        }]
    });
        
    $('#stat2').highcharts({
        title: {
            text: 'Cantidad de visitas papa',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Tuvieja.com',
            x: -20
        },
        xAxis: {
            categories: data.bar.date
            //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            //    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Visitas'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Cantidad',
            data: data.bar.visits
        }]
    });
});