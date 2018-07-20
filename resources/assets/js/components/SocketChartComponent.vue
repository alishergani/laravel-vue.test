<template>
  <div class="component">

  	<h4>Socket Chart Component</h4>

  	<div class="col-12">
  		<line-chart :chart-data="data" 
  								:height="100" 
  								:option="{
  									responsive: true,
  									maintainAspectRation: true
  								}"></line-chart>
			<input type="checkbox" v-model="realtime"> REALTIME 
			<input type="text" v-model="label">
			<input type="text" v-model="sale">

  		<button class="btn btn-warning btn-sm my-2" @click="sendData"><b>Load</b></button>
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
				socket: io('http://localhost:8000'),
				data: [],
				realtime: false,
				label: '',
				sale: 80
			}
		},
	  mounted() {
			this.socket.on('news-action:App\\Events\\NewEvent', (data) => {
				this.data = data.result;
			});
			this.update();


	    console.log('Socket Chart Component mounted.')
	  },
		methods: {
			update() {
				axios.get('/start/socket-chart').then((response) => {
					this.data = response.data
				})
			},
			sendData() {
				axios({
					method: 'get', 
					url: '/start/socket-chart',
					params: {
						label: this.label,
						sale: this.sale,
						realtime: this.realtime
					}
				}).then((response) => {
					console.log(response)
					this.data = response.data
				})
			}
		}

	}

</script>

<style>
	input {
		font-weight: 600;
		color: #000;
	}
</style>