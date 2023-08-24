window.onload = function test() {
  const plugin_icon = document.getElementById('content-guardian-plugin-icon')
  plugin_icon.addEventListener('click', function() {
    setTimeout(() => {
      const ctx = document.getElementById('ai-probability-chart');
      new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [{
            label: 'My First Dataset',
            data: [75, 25],
            backgroundColor: [
              '#72E800',
              '#AC266B'
            ],
          }]
        },
        options: {
          cutout: 90 // define the thickness of arc
        }
      });
    }, 2500);
    
  })
}