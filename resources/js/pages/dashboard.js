import ApexCharts from 'apexcharts';

function renderSalesOverview() {
  const chartElement = document.querySelector('#sales-overview');
  if (!chartElement) {
    return;
  }

  const options = {
    series: [
      { name: 'Revenue', data: [340, 410, 365, 455, 390, 480, 425] },
      { name: 'Orders', data: [230, 275, 245, 315, 290, 350, 320] },
    ],
    chart: {
      type: 'bar',
      height: 300,
      toolbar: {
        show: false,
      },
      foreColor: '#adb0bb',
      fontFamily: 'inherit',
    },
    grid: {
      borderColor: 'var(--bs-border-color)',
      strokeDashArray: 4,
      padding: {
        left: 0,
        right: 0,
        bottom: 0,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '42%',
        borderRadius: 5,
      },
    },
    colors: ['var(--bs-primary)', 'var(--bs-secondary)'],
    dataLabels: {
      enabled: false,
    },
    yaxis: {
      min: 0,
      max: 500,
      tickAmount: 5,
      labels: {
        formatter: (value) => value,
      },
    },
    stroke: {
      show: true,
      width: 3,
      lineCap: 'round',
      colors: ['transparent'],
    },
    xaxis: {
      type: 'category',
      categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      y: {
        formatter: (value, { seriesIndex }) =>
          seriesIndex === 0 ? `$${value}` : value,
      },
    },
    legend: {
      show: false,
    },
  };

  new ApexCharts(chartElement, options).render();
}

renderSalesOverview();
