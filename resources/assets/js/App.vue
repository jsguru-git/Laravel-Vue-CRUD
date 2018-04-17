<template>
	<div class="app">
		<app-header/>
		<div class="app-body">
			<Sidebar/>
			<Main/>
		</div>
	</div>
</template>
<script>
	import AppHeader from './components/layout/AppHeader.vue'
	import Sidebar from './components/layout/Sidebar.vue'
	import Main from './components/layout/Main.vue'
	export default {
		name: 'App',
		components: {
			AppHeader,
			Sidebar,
			Main,
		}
	}
</script>
<style lang="sass" scoped>
	.fade-enter-active, .fade-leave-active
		transition: opacity .5s
	.fade-enter, .fade-leave-active
		opacity: 0
	.app-body
		position: relative
</style>