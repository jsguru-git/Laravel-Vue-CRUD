<template>
	<modal :show="show" @close="close">
		<div class="modal-header">
			<h3>Edit Partner Field name</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label class="form-label">field ID</label>
				<input class="form-control" :value="entry.id" disabled>
			</div>
			<div class="form-group">
				<label class="form-label">partner ID</label>
				<input class="form-control" :value="entry.partner_id" disabled>
			</div>
			<div class="form-group">
				<label class="form-label">field name</label>
				<input class="form-control" v-model="entry.fieldname">
			</div>
			<div class="form-group">
				<label class="form-label">available values</label>
				<input class="form-control" v-model="entry.available_values">
			</div>
			<div class="form-group">
				<label class="form-label">sanitizer</label>
				<input class="form-control" v-model="entry.sanitizers">
			</div>
			<div class="form-group">
				<label class="form-label">validate</label>
				<input class="form-control" v-model="entry.validate">
			</div>
			<div class="form-group">
				<label class="form-label">rx faker type</label>
				<input class="form-control" v-model="entry.rx_faker_type">
			</div>
			<div class="form-group">
				<label class="form-label">default</label>
				<input class="form-control" v-model="entry.default">
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
			entry: {}
		},
		data() {
			return {
				// entry: {},
			}
		},
		components: {
			Modal,
		},
		methods: {
			close: function() {
				var app = this
				app.$emit('close')
			},
			saveEntry: function() {
				var app = this
				if(typeof app.entry.fieldname != 'undefined' && app.entry.fieldname != '') {
					app.axios.patch('/api/v1/partnerfield/' + app.entry.id, app.entry)
					.then(function(resp) {
						app.$emit('saved')
						console.log('PartnerField updated')
						console.log(resp.data)
					})
					.catch(function(resp) {
						alert("Could not update PartnerField.")
					})
					app.close()
				} else {
					alert("Field Name required.")
				}
			}
		}
	}
</script>