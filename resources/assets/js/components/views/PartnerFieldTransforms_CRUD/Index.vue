<template>
	<div>
		<!-- create modal -->
		<c-modal :show="showCModal" @close="showCModal = false" @saved="getLRList(current_page)"
			:left-partner-id="left_partner_id" :right-partner-id="right_partner_id"
			:left-all-fields="left_partner_all_fields" :left-hid-fields="c_left_hid_list" 
			:right-all-fields="right_partner_all_fields" :right-hid-fields="c_right_hid_list"
			:partner-value-maps="partner_value_maps"></c-modal>
		<!-- edit modal -->
		<e-modal :show="showEModal" @close="showEModal = false" @saved="afterEdit"
			:entry="entry"
			:left-all-fields="left_partner_all_fields" :left-hid-fields="e_left_hid_list"
			:right-all-fields="right_partner_all_fields" :right-hid-fields="e_right_hid_list"
			:partner-value-maps="partner_value_maps"></e-modal>
		<div class="form-group">
			<button class="btn btn-success" @click="showCModal = true">Create</button>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Fields Mapping List</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Left Partner&nbsp;(<span class="partner-name">&nbsp;{{left_partner}}&nbsp;</span>) field Name</th>
							<th>Right Partner&nbsp;(<span class="partner-name">&nbsp;{{right_partner}}&nbsp;</span>) field Name</th>
							<th>sanitizer</th>
							<th>transforms</th>
							<th>partnervaluemaps id</th>
							<th>default if empty</th>
							<th>hardcoded</th>
							<th>required</th>
							<th>note</th>
							<th width="10%">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="entry, index in entry_list.data" :key="index">
							<td>{{ entry.partnerfield_name_left }}</td>
							<td>{{ entry.partnerfield_name_right }}</td>
							<td>{{ entry.sanitizer }}</td>
							<td>{{ entry.transforms }}</td>
							<td>{{ entry.partnervaluemaps_id }}</td>
							<td>{{ entry.default_if_empty }}</td>
							<td>{{ entry.hardcoded }}</td>
							<td>{{ entry.required }}</td>
							<td>{{ entry.note }}</td>
							<td>
								<button
									class="btn btn-xs btn-default"
									@click="editEntry(entry)">
									Edit
								</button>
								<button
									class="btn btn-xs btn-danger"
									@click="deleteEntry(entry.id, index)">
									Delete
								</button>
							</td>
						</tr>
					</tbody>
				</table>
				<pagination :data="entry_list" v-on:pagination-change-page="getLRList">
					<span slot="prev-nav">&lt; Previous</span>
					<span slot="next-nav">Next &gt;</span>
				</pagination>
			</div>
		</div>
	</div>
</template>
<script>
	import CModal from './CModal.vue'
	import EModal from './EModal.vue'
	import pagination from 'laravel-vue-pagination'
	import split from 'split-object'
	export default {
		name: 'partner-fields-mapper',
		components: {
			CModal,
			EModal,
			pagination,
		},
		data() {
			return {
				left_partner: null,						// left partner name
				right_partner: null,					// right partner name
				entry_list: {},		 					// field pair(entry) list(paginated) of left and right partners
				entry: {},								// entry (entry: pair of left field and right field)
				c_left_hid_list: {},					// left side of all field pairs
				c_right_hid_list: {},					// right side of all field pairs
				e_left_hid_list: {},
				e_right_hid_list: {},
				left_partner_id: null,					// ID of left partner
				right_partner_id: null,					// ID of right partner
				left_partner_all_fields: {},			// all field list of left partner from partnerfields table
				right_partner_all_fields: {},			// all field list of right partner from partnerfields table
				partner_value_maps: {},					// all partnervaluemaps from partnervaluemaps table
				showCModal: false,
				showEModal: false,
				current_page: null,
			}
		},
		mounted() {
			var app = this
			var queries = app.$route.query
			app.left_partner_id = parseInt(queries.partner_id_left)
			app.right_partner_id = parseInt(queries.partner_id_right)
			app.getPartnerNameById()
			app.getLRList()
			app.getAllLRList()
			app.getTwoPartnerFields()
			app.getPartnerValueMaps()
		},
		methods: {
			/*
			*	Get left partner name and right partner name
			*/
			getPartnerNameById() {
				var app = this
				app.axios.get('/api/v1/partners/' + app.left_partner_id)
				.then(function(resp) {
					app.left_partner = resp.data.name
					console.log("left partner name: "+app.left_partner)
				})
				.catch(function(resp) {
					console.log(resp)
				})
				app.axios.get('/api/v1/partners/' + app.right_partner_id)
				.then(function(resp) {
					app.right_partner = resp.data.name
					console.log("right partner name: "+app.right_partner)
				})
				.catch(function(resp) {
					console.log(resp)
				})
			},
			/*
			*	Get left-right field pairs based on pagination
			*/
			getLRList(page) {
				var app = this
				if(typeof page === 'undefined') {
					page = 1
				}
				app.current_page = page
				app.axios.get('/api/v1/partnerfieldmapper', {
					params: {
						partner_id_left: app.left_partner_id,
						partner_id_right: app.right_partner_id,
						page: page,
					},
				})
				.then(function(resp) {
					app.entry_list = resp.data
					console.log("entry list")
					console.log(resp.data)
				})
				.catch(function(resp) {
					console.log(resp)
				})
			},

			/*
			*	Get all left-right field pairs from partnerfieldtransforms TABLE
			*	Divide it into two side(left and right).
			*/
			getAllLRList() {
				var app = this
				app.axios.get('/api/v1/partnerfieldmapper', {
					params: {
						partner_id_left: app.left_partner_id,
						partner_id_right: app.right_partner_id,
					},
				})
				.then(function(resp) {
					app.c_left_hid_list = split.join(resp.data, {key:'partnerfield_name_left', value:'partnerfield_id_left'})
					app.c_right_hid_list = split.join(resp.data, {key:'partnerfield_name_right', value:'partnerfield_id_right'})
					console.log("already listed left fields")
					console.log(app.c_left_hid_list)
					console.log("already listed right fields")
					console.log(app.c_right_hid_list)
				})
				.catch(function(resp) {
					console.log(resp)
				})
			},
			/*
			*	show EModal and pass entry id in the modal.
			*/
			editEntry(entry) {
				var app = this
				app.showEModal = true
				app.entry = Object.assign({},entry)
				// get copys of c_left_hid_list and c_right_hid_list 
				app.e_left_hid_list = Object.assign({},app.c_left_hid_list)
				app.e_right_hid_list = Object.assign({},app.c_right_hid_list)
				// remove selected fields from e_left_hid_list and e_right_hid_list
				delete app.e_left_hid_list[app.entry.partnerfield_name_left]
				delete app.e_right_hid_list[app.entry.partnerfield_name_right]
			},
			/*
			*	Delete left-right field pair on partnerfieldtransforms TABLE
			*	Update left-right field list
			*/
			deleteEntry(id, index) {
				if (confirm("Do you really want to delete it?")) {
					var app = this
					app.axios.delete('/api/v1/partnerfieldmapper/' + id)
						.then(function(resp) {
							var deleted_left_field = app.entry_list.data[index].partnerfield_name_left
							var deleted_right_field = app.entry_list.data[index].partnerfield_name_right
							
							app.getLRList(app.current_page)

							delete app.c_left_hid_list[deleted_left_field]
							delete app.c_right_hid_list[deleted_right_field]
							console.log("deleted_field_pair: "+deleted_left_field+", "+deleted_right_field)
						})
						.catch(function(resp) {
							alert("Could not delete mapper pair")
						})
				}
			},
			/*
			*	Get all fields of left and right partner from partnerfields TABLE
			*/
			getTwoPartnerFields() {
				var app = this
				// Get all fields of left partner
				app.axios.get('/api/v1/partnerfield', {
					params: {
						partner_id:app.left_partner_id,
					},
				})
				.then(function(resp) {
					// array = [{id: 1, fieldname: 'AA', ...}, {id: 2, fieldname: 'BB', ...}, {id: 3, fieldname: 'CC', ...},...]
					var array = resp.data
					// {AA: 1, BB: 2, CC: 3,...}
					app.left_partner_all_fields = split.join(array, {key:'fieldname', value:'id'})
					console.log('left partner all fields...')
					console.log(app.left_partner_all_fields)
				})
				.catch(function(resp) {
					console.log(resp)
				})
				// Get all fields of right partner
				app.axios.get('/api/v1/partnerfield', {
					params: {
						partner_id:app.right_partner_id,
					},
				})
				.then(function(resp) {
					// array = [{id: 1, fieldname: 'AA', ...}, {id: 2, fieldname: 'BB', ...}, {id: 3, fieldname: 'CC', ...},...]
					var array = resp.data
					// {AA: 1, BB: 2, CC: 3,...}
					app.right_partner_all_fields = split.join(array, {key:'fieldname', value:'id'})
					console.log('right partner all fields...')
					console.log(app.right_partner_all_fields)
				})
				.catch(function(resp) {
					console.log(resp)
				})
			},
			getPartnerValueMaps() {
				var app = this
				app.axios.get('/api/v1/partnervaluemaps')
				.then(function(resp) {
					app.partner_value_maps = resp.data
					console.log('all partnervaluemaps.')
					console.log(resp.data)
				})
				.catch(function(resp) {
					console.log(resp)
				})
			},
			afterEdit(updated_cLeftHidList, updated_cRightHidList) {
				var app = this
				app.c_left_hid_list = updated_cLeftHidList
				app.c_right_hid_list = updated_cRightHidList
				app.getLRList(app.current_page)
			}
		}
	}
</script>
<style lang="sass" scoped>
	.partner-name
		font-size: 17px
		font-style: italic
		color: #a7a7a7
</style>