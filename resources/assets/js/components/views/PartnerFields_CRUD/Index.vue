<template>
	<div>
		<c-modal :show="showCModal" :partner-id="partner_id"
			@saved="getEntries(current_page)" @close="showCModal=false"></c-modal>
		<e-modal :show="showEModal" :entry="entry"
			@saved="getEntries(current_page)" @close="showEModal=false"></e-modal>
		<div class="form-group">
			<label class="form-lable">Pick Partner</label>
			<select class="form-control" v-model="partner_id" @change="changePartner">
				<option v-for="partner in partner_list" :value="partner.id" :key="partner.id">{{ partner.name }}</option>
			</select>
		</div>
		<div class="form-group">
			<button class="btn btn-success" @click="showCModal=true">Create</button>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Partner Fields List</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>field ID</th>
							<th>partner ID</th>
							<th>field name</th>
							<th>available values</th>
							<th>sanitizers</th>
							<th>validate</th>
							<th>rx faker type</th>
							<th>default</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="entry,index in entry_list.data" :key="index">
							<td>{{ entry.id }}</td>
							<td>{{ entry.partner_id }}</td>
							<td>{{ entry.fieldname }}</td>
							<td>{{ entry.available_values }}</td>
							<td>{{ entry.sanitizers }}</td>
							<td>{{ entry.validate }}</td>
							<td>{{ entry.rx_faker_type }}</td>
							<td>{{ entry.default }}</td>
							<td>
								<button
									class="btn btn-xs btn-default"
									@click="editEntry(entry)">
									Edit
								</button>
								<button
									class="btn btn-xs btn-danger"
									@click="deleteEntry(entry.id)">
									Delete
								</button>
							</td>
						</tr>
					</tbody>
				</table>
				<pagination :data="entry_list" v-on:pagination-change-page="getEntries">
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
	import Pagination from  'laravel-vue-pagination'
	export default {
		data() {
			return {
				entry_list: {},
				partner_list: {},
				entry: {},
				partner_id: null,
				showCModal: false,
				showEModal: false,
				current_page: null,
			}
		},
		components: {
			CModal,
			EModal,
			Pagination,
		},
		mounted() {
			var app = this
			app.axios.get('/api/v1/partners')
			.then(function(resp) {
				app.partner_list = resp.data
				var queries = app.$route.query
				var partner_id = parseInt(queries.partner_id)
				console.log("partnerID"+partner_id)
				if(isNaN(partner_id)) {
					app.partner_id = parseInt(app.partner_list[0].id)
				} else {
					app.partner_id = partner_id
				}
				app.getEntries()
				console.log("Get all partners.")
				console.log(resp.data)
			})
			.catch(function(resp) {
				console.log(resp)
				alert("Could not load partners")
			})
		},
		methods: {
			getEntries(page) {
				var app = this
				if(typeof page === 'undefined') {
					page = 1
				}
				app.current_page = page
				app.axios.get('/api/v1/partnerfield', {
					params: {
						partner_id:app.partner_id,
						page: page,
					},
				})
				.then(function(resp) {
					app.entry_list = resp.data
					console.log("all fields of parter " + app.partner_id)
					console.log(resp.data)
				})
				.catch(function(resp) {
					console.log(resp)
				})
			},
			editEntry(entry) {
				var app = this
				app.showEModal = true
				app.entry = Object.assign({},entry)
			},
			deleteEntry(id) {
				if (confirm("Do your really want to delete it?")) {
					var app = this
					app.axios.delete('/api/v1/partnerfield/' + id)
					.then(function(resp) {
						app.getEntries(app.current_page)
						console.log("Selected Field deleted.")
					})
					.catch(function(resp) {
						alert("Could not delete Field.")
					})
				}
			},
			changePartner: function(){
				var app = this
				app.$router.replace({name: "PartnerFields", query: {partner_id:app.partner_id}})
				app.getEntries()
			},
		}
	}
</script>