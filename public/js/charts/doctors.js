const chart = Highcharts.chart('container-medico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Tablero de Citas Generales'
    },
    xAxis: {
        categories: [],
        crosshair: true
    },
    yAxis: {
        title: {
            useHTML: true,
            text: 'Citas atendidas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: []
});

let $start, $end;

function fetchData() {
    const startDate = $start.val();
    const endDate = $end.val();
    const url = base_url + `reportes/doctors/column/data?start=${startDate}&end=${endDate}`;

    //Fetch API
    fetch(url)
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            const colorCitasAtendidas = 'rgba(101, 40, 252, 0.7)'; // verde
            const colorCitasCanceladas = 'rgba(255, 78, 72, 0.7)'; // rojo
            const colorCitasConfirmadas = 'rgba(23, 194, 254, 0.7)'; // rojo

            myJson.series[0].color = colorCitasAtendidas; // Citas Atendidas
            myJson.series[1].color = colorCitasCanceladas; // Citas Canceladas
            myJson.series[2].color = colorCitasConfirmadas; // Citas Confirmadas
            //console.log(myJson);
            chart.xAxis[0].setCategories(myJson.categories);

            if (chart.series.length > 0) {
                chart.series[2].remove();
                chart.series[1].remove();
                chart.series[0].remove();
            }

            chart.addSeries(myJson.series[0]); //Citas Atendidas
            chart.addSeries(myJson.series[1]); //Citas Canceladas
            chart.addSeries(myJson.series[2]); //Citas Confirmadas
        });
}

$(function () {

    $start = $('#startDate');
    $end = $('#endDate');

    fetchData();

    $start.change(fetchData);
    $end.change(fetchData);
});