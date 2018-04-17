<template>
	<modal :show="show" @close="close">
		<div class="modal-header">
			<h3>New Partner</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label class="form-label">name</label>
				<input class="form-control" v-model="entry.name">
			</div>
			<div class="form-group">
				<label class="form-label">protocol</label>
				<select
					class="form-control"
					v-model="entry.protocol">
					<option v-for="(item, idx) in ['http','https','smtp']"
						:value="item" :key="idx">{{item}}</option>	
				</select>
			</div>
			<div class="form-group">
				<label class="form-label">domain</label>
				<input class="form-control" v-model="entry.domain">
			</div>
			<div class="form-group">
				<label class="form-label">base_url</label>
				<input class="form-control" v-model="entry.base_url">
			</div>
			<div class="form-group">
				<label class="form-label">search</label>
				<input class="form-control" v-model="entry.search">
			</div>
		</div>
		<div class="modal-footer text-right">
			<button class="modal-default-button" @click="saveEntry">Save</button>
		</div>
	</modal>
</template>
<script>
	import Modal from '../../materials/ModalTemp.vue'
	export default {
		props: {
			show: Boolean,
		},
		data() {
			return {
				entry: {},
			}
		},
		components: {
			Modal,
		},
		methods: {
			close: function() {
				var app = this
				app.$emit('close')
				app.entry = {}
			},
			saveEntry: function() {
				var app = this
				if(app.entry.name != undefined) {
					app.axios.post('/api/v1/partners', app.entry)
					.then(function(resp) {
						app.$emit('saved')
						console.log('new Partner created.')
						console.log(resp.data)
					})
					.catch(function(resp) {
						alert("Could not create new Parter.")
					})
					app.close()
				} else {
					alert("Partner name required.")
				}
			},
		},
	}
</script>