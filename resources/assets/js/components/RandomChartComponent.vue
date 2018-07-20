<template>
  <div class="component">

  	<h4>Random Chart Component</h4>

  	<div class="col-12">
  		<button class="btn btn-warning btn-sm my-2" @click="update"><b>Reload</b></button>
  		<line-chart :chart-data="data" 
  								:height="100" 
  								:option="{
  									responsive: true,
  									maintainAspectRation: true
  								}"></line-chart>
  	</div>
		
		
		</table>
    
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
			data: []
		}
	},
	methods: {
		update() {
			axios.get('/start/random-chart-data').then((response) => {
				console.log(response)
				this.data = response.data
			})
		}
	},
  mounted() {
      console.log('Random Chart Component mounted.')
    }
  }
</script>