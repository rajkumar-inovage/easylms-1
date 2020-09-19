<script>
var num_users = []; 
var xlabels = [];

<?php
// Data for "Summary Report"
$i = 1;
if ( ! empty ($user_registration) ) {
	foreach ($user_registration as $date=>$num) {
		?>
		num_users.push(<?php echo $num; ?>);
		xlabels.push("<?php echo date('j D', $date); ?>");
		<?php 
		$i++;
		if ($i >= 10) break;
	}
} 

?>
var chartTooltip = {
	backgroundColor: foregroundColor,
	titleFontColor: primaryColor,
	borderColor: separatorColor,
	borderWidth: 0.5,
	bodyFontColor: primaryColor,
	bodySpacing: 10,
	xPadding: 15,
	yPadding: 15,
	cornerRadius: 0.15,
	displayColors: false
};
var ctx = document.getElementById("user-registered").getContext('2d');
var briefChart = new Chart(ctx, {
    type: 'LineWithShadow',
    data: {
        labels: xlabels,
        datasets: [{
   			label: 'User Created',
            data: num_users,
            borderColor: themeColor1,
            pointBackgroundColor: foregroundColor,
            pointBorderColor: themeColor1,
            pointHoverBackgroundColor: themeColor1,
            pointHoverBorderColor: foregroundColor,
            pointRadius: 4,
            pointBorderWidth: 2,
            pointHoverRadius: 5,
            fill: true,
            borderWidth: 2,
            backgroundColor: themeColor1_10
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
		tooltips: chartTooltip,
		plugins: {
			datalabels: {
				display: false
			}
		},
		legend:{
			display: false,
		},
		scales: {
			yAxes: [
                {
                  gridLines: {
                    display: true,
                    lineWidth: 1,
                    color: "rgba(0,0,0,0.1)",
                    drawBorder: false
                  },
                  scaleLabel: {
                  	display: false,
                  	labelString: 'Users'
                  },
                  ticks: {
                    beginAtZero: true,
                    stepSize: 1,
                    min: 0,
                    max: Math.max(...num_users) + 1,
                    padding: 0
                  }
                }
              ],
              xAxes: [
                {
                  gridLines: {
                    display: false
                  },
                  scaleLabel: {
                  	display: false,
                  	labelString: 'Date'
                  }
                }
              ]
		},
	    onResize: function(briefChart, size) {
	    	if(size.height < 200){
	    		briefChart.options.scales.xAxes[0].display = false;
	    	}else {
	    		briefChart.options.scales.xAxes[0].display = true;
	    	}
		}
    }
});
</script>