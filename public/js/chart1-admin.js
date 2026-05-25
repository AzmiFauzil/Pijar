var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: 'Jumlah peminjam',
            data: [55, 30, 70, 100, 90, 60, 80, 45, 25, 10, 65, 20],
            backgroundColor: [
                '#BFDDF0',
                '#F6F4E8',
                '#FFEEA9'
            ],

            borderColor: [
                '#EFF3EA',
                '#C5D3E8',
                '#FFEEA8'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,

        cutout: '50%',

        plugins: {
            legend: {
                position: 'top'
            }
        }

    }
});