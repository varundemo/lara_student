<!DOCTYPE html>
<html>
<head>
	<title>Check</title>
	<script src="https://unpkg.com/vue@3.0.5"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js" integrity="sha512-otOZr2EcknK9a5aa3BbMR9XOjYKtxxscwyRHN6zmdXuRfJ5uApkHB7cz1laWk2g8RKLzV9qv/fl3RPwfCuoxHQ==" crossorigin="anonymous"></script>

<style type="text/css">
	.box{
		padding : 100px 0;
		width: 400px;
		text-align:  center;
		background: #ddd;
		margin: 20px;
		display: inline-block;
	}
</style>
</head>
<body>
<div id="counter">
	<div v-if="show">
		<p v-for="skill in skills">@{{ skill }}</p> 
 <p></p>
 <button v-on:click="age--">Age Decrease</button> <button v-on:click="age++">Age Increase</button>
 
	</div>
 <button @click="toggleshow"> 
 <span v-if="show">Hide the Book</span>
 <span v-else>Show the Book</span>
 </button>
 <br>
 <span v-show="show"> Currently showing books</span>


 <!-- Mouse event -->
 <div class="box" @mouseover="handleEvent($event , 5)">Mouse Over (Enter)</div>
 <div class="box" @mouseleave="handleEvent">Mouseleave</div>
 <div class="box" @dblclick="handleEvent1">Double click</div>
 <div class="box" @mousemove="handlerequest"> Position - </div>
</div>


<script type="text/javascript">
		const apps = Vue.createApp({
		//template: "<h1>Hey Ramchandra keh gaye sia se, esa kalyug ayega. </h1>"
		data() {
			skills : []
			return {
				show : true,
				title : "Hey Ramchandra keh gaye sia se, esa kalyug ayega. ",
				author : "Shree Ram ",
				age : "22",
				x : 0,
				y : 0
			}
		},
		methods : {
			toggleshow() {
				this.show = !this.show
			},
			handleEvent1(){
				axios.get('/rudraVarun/larvel-fol/blog/public/apiCheck?id=1').then(response => console.log(response));
			},
			handleEvent(e, data){
				console.log(e ,e.type)
				if (data) {
					console.log(data)
				}
			},
			handlerequest(e){
				this.x = e.offsetX
				this.y = e.offsetY
			}
		}
	})
	apps.mount('#counter')
</script>
</body>
</html>