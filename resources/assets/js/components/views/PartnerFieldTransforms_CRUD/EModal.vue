<template>
	<modal :show="show" @close="close">
		<div class="modal-header">
			<h3>Edit Mapping Pair</h3>
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
			<div class="form-group">
				<label class="form-label">
					Right partner field Name
				</label>
				<select
					class="form-control"
					v-model="entry.partnerfield_name_right">
					<option v-for="(id,field) in rightAllFields" :value="field" v-if="!(field in rightHidFields)" :key="id">{{field}}</option>		
				</select>
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
			<button class="modal-default-button" @click="savePair()">Save</button>
		</div>
	</modal>
</template>
<script>
	import Modal from '../../materials/ModalTemp.vue'
	export default {
		props: {
			show: Boolean,
			entry: {
				type: Object,
				default: function() {
					return {
						id: null,
						partnerfield_name_left: null,
						partnerfield_name_right: null,
					}
				}
			},
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
				pair: {
					partnerfield_name_left: null,
					partnerfield_name_right: null,
				},
				errors: {},
			}
		},
		methods: {
			close: function() {
				var app = this
				app.errors = {}
				app.$emit('close')
			},
			savePair: function() {
				var app = this
				// var newPair = app.pair
				var newPair = {}
				
				// newPair.partnerfield_name_left = app.entry.partnerfield_name_left
				// newPair.partnerfield_name_right = app.entry.partnerfield_name_right
				// Get partner field ID
				app.entry.partnerfield_id_left = app.leftAllFields[newPair.partnerfield_name_left]
				app.entry.partnerfield_id_right = app.rightAllFields[newPair.partnerfield_name_right]
				app.axios.patch('/api/v1/partnerfieldmapper/' + app.entry.id, app.entry)
				.then(function(resp) {
					var e_left_hid_list = Object.assign({},app.leftHidFields)
					var e_right_hid_list = Object.assign({},app.rightHidFields)
					e_left_hid_list[resp.data.partnerfield_name_left] = resp.data.partnerfield_id_left
					e_right_hid_list[resp.data.partnerfield_name_right] = resp.data.partnerfield_id_right
					app.$emit('saved', e_left_hid_list, e_right_hid_list)
					app.close()
					console.log('pair updated')
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