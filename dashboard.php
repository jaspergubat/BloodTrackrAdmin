<!-- dashboard.php -->
<?php include('header.php'); ?>

<div class="content">
  <div class="dashboard-container">
      <div class="dashboard-header">
          <div class="dashboard-card total-views">
              <i class="bx bx-show"></i>
              <div class="card-info">
                  <span class="card-title">3.456K</span>
                  <span class="card-subtitle">Total views</span>
              </div>
          </div>
          <div class="dashboard-card total-profit">
              <i class="bx bx-cart"></i>
              <div class="card-info">
                  <span class="card-title">$45,2K</span>
                  <span class="card-subtitle">Total Profit</span>
              </div>
          </div>
          <div class="dashboard-card total-product">
              <i class="bx bx-package"></i>
              <div class="card-info">
                  <span class="card-title">2,450</span>
                  <span class="card-subtitle">Total product</span>
              </div>
          </div>
          <div class="dashboard-card total-users">
              <i class="bx bx-user"></i>
              <div class="card-info">
                  <span class="card-title">3,456</span>
                  <span class="card-subtitle">Total Users</span>
              </div>
          </div>
      </div>
      <div class="dashboard-stats">
          <div class="stats-header">
              <h3>Statistics</h3>
              <select name="stats-period" id="stats-period">
                  <option value="month">Month</option>
                  <option value="year">Year</option>
              </select>
          </div>
          <div class="stats-chart">
              <!-- Example chart representation, replace with actual chart logic -->
              <canvas id="statsChart"></canvas>
          </div>
      </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statsChart').getContext('2d');
    const statsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Statistics',
                data: [50000, 75000, 89540, 45000, 60000, 30000, 80000],
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return `$${tooltipItem.parsed.y.toLocaleString()} - ${tooltipItem.raw} views`;
                        }
                    }
                }
            }
        }
    });
</script>

<style>
.dashboard-container {
    padding: 20px;
}
.dashboard-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}
.dashboard-card {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
}
.dashboard-card i {
    font-size: 24px;
    margin-right: 10px;
}
.card-info .card-title {
    font-size: 18px;
    font-weight: bold;
}
.card-info .card-subtitle {
    font-size: 14px;
    color: #888;
}
.dashboard-stats {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.stats-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
</style>