<template>
	<modal :show="show" @close="close">
		<div class="modal-header">
			<h3>New Partner Field name</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label class="form-label">partner ID</label>
				<input class="form-control" :value="partnerId" disabled>
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
			partnerId: Number,
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
				app.entry.partner_id = app.partnerId
				if((typeof app.entry.fieldname !== 'undefined' && app.entry.fieldname != '')
					&& typeof app.entry.partner_id != 'undefined') {
					app.axios.post('/api/v1/partnerfield', app.entry)
					.then(function(resp) {
						app.$emit('saved')
						console.log('new Field created.')
						console.log('resp.data')
					})
					.catch(function(resp) {
						alert("Could not create new Field.")
					})
					app.close()
				} else {
					alert("Field name required.")
				}
			},
		},
	}
</script>