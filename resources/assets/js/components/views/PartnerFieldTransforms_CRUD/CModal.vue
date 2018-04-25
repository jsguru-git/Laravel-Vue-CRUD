<template>
	<modal :show="show" @close="close">
		<div class="modal-header">
            <h3>New Mapping Pair</h3>
        </div>
        <div class="modal-body">
        	<div class="form-group">
	            <label class="form-label">
	                Left Partner field Name
	            </label>
	            <select
					class="form-control"
					v-model="entry.partnerfield_name_left">
					<option v-for="(id,field) in leftAllFields" :value="field" v-if="!(field in leftHidFields)" :key="id">{{field}}</option>
				</select>
			</div>
			<div class="form-group" v-bind:class="{'has-error':errors.partnerfield_name_right}">
	            <label class="form-label">
	                Right Partner field Name
	            </label>
	            <select
					class="form-control"
					v-model="entry.partnerfield_name_right">
					<option v-for="(id,field) in rightAllFields" :value="field" v-if="!(field in rightHidFields)" :key="id">{{field}}</option>
				</select>
				<div v-if="errors.partnerfield_name_right" class="help-block">
					<span v-for="error in errors.partnerfield_name_right">{{ error }}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="form-label">sanitizer</label>
				<input class="form-control" v-model="entry.sanitizer">
			</div>
			<div class="form-group">
				<label class="form-label">transforms</label>
				<input class="form-control" v-model="entry.transforms">
			</div>
			<div class="form-group" v-bind:class="{'has-error':errors.partnervaluemaps_id}">
				<label class="form-label">partnervaluemaps id</label>
				<!-- <input class="form-control" v-model="entry.partnervaluemaps_id"> -->
				<select
					class="form-control"
					v-model="entry.partnervaluemaps_id">
					<option v-for="item, index in partnerValueMaps" :value="item.id" :key="index">{{item.name}}</option>
				</select>
				<div v-if="errors.partnervaluemaps_id" class="help-block">
					<span v-for="error in errors.partnervaluemaps_id">{{ error }}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="form-label">default if empty</label>
				<input class="form-control" v-model="entry.default_if_empty">
			</div>
			<div class="form-group">
				<label class="form-label">hardcoded</label>
				<input class="form-control" v-model="entry.hardcoded">
			</div>
			<div class="form-group" v-bind:class="{'has-error':errors.required}">
				<label class="form-label">required</label>
				<input class="form-control" v-model="entry.required">
				<div v-if="errors.required" class="help-block">
					<span v-for="error in errors.required">{{ error }}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="form-label">note</label>
				<input class="form-control" v-model="entry.note">
			</div>
        </div>
        <div class="modal-footer text-right">
            <button class="modal-default-button" @click="savePair()">
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
			leftPartnerId: Number,
			rightPartnerId: Number,
			leftAllFields: Object,
			leftHidFields: Object,
			rightAllFields: Object,
			rightHidFields: Object,
			partnerValueMaps: Object,
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
			savePair: function() {
				var app = this
				var selected_field_name_left = app.entry.partnerfield_name_left,
					selected_field_name_right = app.entry.partnerfield_name_right

				/*
				*	please see below
				*		null === undefined	-> false
				*		null == undefined	-> true
				*		null === null		-> true
				*/
				app.entry.partner_id_left = app.leftPartnerId
				app.entry.partner_id_right = app.rightPartnerId
				app.entry.partnerfield_id_left = app.leftAllFields[selected_field_name_left]
				app.entry.partnerfield_id_right = app.rightAllFields[selected_field_name_right]
				console.log('new pair...')
				console.log(app.entry)
				app.axios.post('/api/v1/partnerfieldmapper', app.entry)
				.then(function(resp) {
					// add left field and right field of new pair into their hid fields list respectively.
					var key = app.entry.partnerfield_name_left  							// field name
					var value = app.leftAllFields[app.entry.partnerfield_name_left]			// field ID
					app.leftHidFields[key] = value

					key = app.entry.partnerfield_name_right									// field name
					value = app.rightAllFields[app.entry.partnerfield_name_right]			// field ID
					app.rightHidFields[key] = value
					app.$emit('saved')
					app.close()
					console.log('new pair created.')
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