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
					v-model="pair.partnerfield_name_left">
					<option v-for="(id,field) in leftAllFields" :value="field" v-if="!(field in leftHidFields)" :key="id">{{field}}</option>
				</select>
			</div>
			<div class="form-group">
	            <label class="form-label">
	                Right Partner field Name
	            </label>
	            <select
					class="form-control"
					v-model="pair.partnerfield_name_right">
					<option v-for="(id,field) in rightAllFields" :value="field" v-if="!(field in rightHidFields)" :key="id">{{field}}</option>
				</select>
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
		},
		components: {
			Modal,
		},
		data() {
			return {
				pair: {
					partnerfield_name_left: null,
					partnerfield_name_right: null,
				}
			}
		},
		methods: {
			close: function() {
				var app = this
				app.$emit('close')
				app.pair.partnerfield_name_left = null
				app.pair.partnerfield_name_right = null
			},
			savePair: function() {
				var app = this
				var selected_field_name_left = app.pair.partnerfield_name_left,
					selected_field_name_right = app.pair.partnerfield_name_right

				/*
				*	please see below
				*		null === undefined	-> false
				*		null == undefined	-> true
				*		null === null		-> true
				*/
				// if(selected_field_name_left != undefined && selected_field_name_right != undefined) {
				if(selected_field_name_right != undefined) {
					var newPair = {}
					newPair.partner_id_left = app.leftPartnerId
					newPair.partner_id_right = app.rightPartnerId
					newPair.partnerfield_name_left = selected_field_name_left
					newPair.partnerfield_name_right = selected_field_name_right
					newPair.partnerfield_id_left = app.leftAllFields[selected_field_name_left]
					newPair.partnerfield_id_right = app.rightAllFields[selected_field_name_right]
					console.log('new pair...')
					console.log(newPair)
					app.axios.post('/api/v1/partnerfieldmapper', newPair)
						.then(function(resp) {
							// add left field and right field of new pair into their hid fields list respectively.
							var key = newPair.partnerfield_name_left  							// field name
							var value = app.leftAllFields[newPair.partnerfield_name_left]		// field ID
							app.leftHidFields[key] = value

							key = newPair.partnerfield_name_right								// field name
							value = app.rightAllFields[newPair.partnerfield_name_right]			// field ID
							app.rightHidFields[key] = value		
							// app.$emit('saved', app.leftHidFields, app.rightHidFields)
							app.$emit('saved')
							console.log('new pair created.')
							console.log(resp.data)
						})
						.catch(function(resp) {
							alert("Could not create mapper pair.")
						})
					app.close()
				} else {
					alert("Please select at least the right partner field.")
				}
			},
		},
	}
</script>