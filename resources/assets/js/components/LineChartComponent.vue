<template>
  <div class="component">

  	<h4>Line Chart Component</h4>

  	<div class="col-12">
  		<button class="btn btn-warning btn-sm my-2" @click="update"><b>Load</b></button>
  		<br>
  		<input type="text" v-model="label">
  		<input type="number" v-model.number="sale" >
  		<button class="btn btn-warning btn-sm my-2" @click="updateNew"><b>add data</b></button>

  		<line-chart :chart-data="chartData" 
  								:height="100" 
  								:option="{
  									responsive: true,
  									maintainAspectRation: true
  								}"></line-chart>

  	</div>
    
  </div>
</template>

<script>
import LineChart from './LineChart.js'

export default {
	components: {
		LineChart
	},
	data() {
		return {
			chartData: null,
			label: '',
			sale: 0
		}
	},
	methods: {
		update() {
			axios.get('/start/chart-data').then((response) => {

				this.chartData = {
					labels: [],
					datasets: [{
						label: 'DevStack',
						backgroundColor: '#4d8af5',
						data: []
					}]
				}
				
				response.data.forEach( (item, i) => {
					this.chartData.datasets.forEach( (elem, i) => {
						elem.data.push(item.stars)
					});
					this.chartData.labels.push(item.name)
				});
  			console.log('chart data', this.chartData.datasets[0]);

			})
		},
		updateNew() {
			// if (this.label == '') break;
			const newData = {
				labels: [...this.chartData.labels],
				datasets: [{
					label: 'DevStack',
					backgroundColor: '#4d8af5',
					data: [...this.chartData.datasets[0].data]
				}]
			}
			newData.labels.push(this.label);
			newData.datasets[0].data.push(Number(this.sale));
			this.chartData = newData;
			this.label = ''
			this.sale = 0
		}
	},
  mounted() {
  		this.update();
      console.log('Line Chart Component mounted.')
    }
  }
</script>