<template>
  <div class="component">

  	<h4>Ajax Component</h4>
		
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">
  					<button class="btn btn-warning btn-sm" 
  									@click="update"
  									v-show="!loading"><b>Load</b></button>
  					<button type="button" class="btn btn-warning btn-sm" v-show="loading"><b>Loading ...</b></button>
		      </th>
		      <th scope="col">Name</th>
		      <th scope="col">Field</th>
		    </tr>
		  </thead>
	  	<transition-group name="list"
									      tag="tbody"
									      v-bind:css="false"
									      v-on:before-enter="beforeEnter">

		    <tr v-for="(scientist, i) in scientists" :key="i" class="item">
		      <th scope="row">{{scientist.id}}</th>
		      <td><h5>{{scientist.name}}</h5></td>
		      <td><h5>{{scientist.filed}}</h5></td>
		    </tr>

	    </transition-group>
		</table>

		<template v-if="this.scientists.length > 0">
			<input type="text" v-model="name">
			<input type="text" v-model="job">
			<button class="btn btn-warning btn-sm my-2" @click="addNew"><b>add new</b></button>
		</template>

    
  </div>
</template>

<script>
export default {
	data() {
		return {
			scientists: [],
			loading: false,
			elem: 0,
			name: '',
			job: ''
		}
	},
	methods: {
		update() {
			this.loading = true 
			setTimeout( () => {
				axios.get('/start/get-json').then( (res) => {
					this.scientists = res.data
					this.loading = false
				});
			}, 1000)
		},
    beforeEnter: function(el) {
    	this.elem++
    	setTimeout(() => {
    		el.classList.add('show')
    	}, 200 * this.elem )
    },
    addNew() {
    	console.log('aaaa', this.scientists)
    	this.scientists.push({
    		id: this.scientists.length + 1,
    		name: this.name,
    		filed: this.job
    	})
    	this.name = ''
			this.job = ''
    }
	},
  mounted() {
      console.log('Ajax Component mounted.')
    }
  }
</script>

<style>
	.item {
		opacity: 0;
		display: none;
		transition: 1s;
	}
	.item:nth-child(odd) {
		background-color: #777;
		color: #fff;
	}
	.item.show {
		opacity: 1;
		display: table-row;
		transition: 1s;
	}
</style>