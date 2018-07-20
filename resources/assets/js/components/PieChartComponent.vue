<template>
  <div class="component">

  	<h4>Pie Chart Component</h4>

  	<div class="col-12">
  		<button class="btn btn-warning btn-sm my-2" @click="update"><b>Load</b></button>
  		<pie-chart :chart-data="data" 
  								:height="100" 
  								:option="{
  									responsive: true,
  									maintainAspectRation: true
  								}"></pie-chart>
  	</div>
		
		
		</table>
    
  </div>
</template>

<script>
import PieChart from './PieChart.js'

export default {
	components: {
		PieChart
	},
	data() {
		return {
			data: []
		}
	},
	methods: {
		update() {
			axios.get('/start/pie-chart-data').then((response) => {
				console.log(response)
				this.data = response.data
			})
		}
	},
  mounted() {
      console.log('Pie Chart Component mounted.')
    }
  }
</script>