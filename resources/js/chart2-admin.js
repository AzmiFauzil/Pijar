var ctx = document.getElementById('bar-chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Elektronik', 'Olahraga', 'Kebersihan'],
        datasets: [{
            label: 'Jumlah peminjam',
            data: [70, 45, 20],
            backgroundColor: [
                '#BFDDF0',
                '#F6F4E8',
                '#FFEEA9'


            ]
        }]
    },
    options: {
        responsive:true
    }
});