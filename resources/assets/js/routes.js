import PropComponent from './components/PropComponent.vue'
import AjaxComponent from './components/AjaxComponent.vue'
import LineChartComponent from './components/LineChartComponent.vue'
import PieChartComponent from './components/PieChartComponent.vue'
import RandomChartComponent from './components/RandomChartComponent.vue'
import SocketChartComponent from './components/SocketChartComponent.vue'

const routes = [
	{ 
  	path: '/start',
  	component: { template: '<h1 class="text-center mt-5"><b>Select one!</b></h1>' }
  },
  { 
  	path: '/prop',
  	component: PropComponent
  },
  { 
  	path: '/ajax',
  	component: AjaxComponent
  },
  { 
  	path: '/line',
  	component: LineChartComponent
  },
  { 
  	path: '/pie',
  	component: PieChartComponent
  },
  { 
  	path: '/random',
  	component: RandomChartComponent
  },
  { 
  	path: '/socket',
  	component: SocketChartComponent
  }
];

export default routes;