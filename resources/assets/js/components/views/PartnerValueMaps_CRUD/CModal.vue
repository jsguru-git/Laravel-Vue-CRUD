<template>
	<modal :show="show" @close="close">
		<div class="modal-header">
			<h3>New PartnerValueMap</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label class="form-label">name</label>
				<input class="form-control" v-model="entry.name">
			</div>
			<div class="form-group" v-bind:class="{'has-error':errors.valuemap}">
				<label class="form-label">valuemap</label>
				<textarea class="form-control" v-model="entry.valuemap" rows="4" cols="50"></textarea>
				<div v-if="errors.valuemap" class="help-block">
					<span v-for="error in errors.valuemap">{{ error }}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="form-label">description</label>
				<input class="form-control" v-model="entry.description">
			</div>
		</div>
		<div class="modal-footer text-right">
			<button class="modal-default-button" @click="saveEntry()">
				Save
			</button>
		</div>
	</modal>
</template>
<script>
	import Modal from '../../materials/ModalTemp.vue'
	export default {
		props: {
			show: Boolean,
		},
		components: {
			Modal,
		},
		data() {
			return {
				entry: {},
				errors: {},
			}
		},
		methods: {
			close: function() {
				var app = this
				app.$emit('close')
				app.entry = {}
				app.errors = {}
			},
			saveEntry: function() {
				var app = this
				app.axios.post('/api/v1/partnervaluemaps', app.entry)
				.then(function(resp) {
					app.$emit('saved')
					app.close()
					console.log('new PartnerValueMap created.')
					console.log(resp.data)
				})
				.catch(function(resp) {
					app.errors = resp.response.data
					console.log("error message")
					console.log(app.errors)
				})
			},
		},
	}
</script>