<template>
  <div class="component">

  	<h4>Prop Component</h4>

		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Field</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr v-for="(scientist) in scientists">
		      <th scope="row">{{scientist.id}}</th>
		      <td><h5>{{scientist.name}}</h5></td>
		      <td><h5>{{scientist.filed}}</h5></td>
		    </tr>
		  </tbody>
		</table>
    
  </div>
</template>

<script>
export default {
	name: 'prop',
	props: [
		'scientists'
	],
  mounted() {
      console.log('Prop Component mounted.', this.scientists)
    }
  }
</script>