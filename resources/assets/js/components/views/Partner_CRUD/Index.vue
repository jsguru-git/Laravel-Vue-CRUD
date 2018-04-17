<template>
	<div>
		<c-modal :show="showCModal" 
			@saved="getEntries(current_page)" @close="showCModal=false"></c-modal>
		<e-modal :show="showEModal" :entry="entry"
			@saved="getEntries(current_page)" @close="showEModal=false"></e-modal>
		<div class="form-group">
			<button class="btn btn-success" @click="showCModal=true">Create</button>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Partner List</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>name</th>
							<th>protocol</th>
							<th>domain</th>
							<th>base_url</th>
							<th>search</th>
							<th width="20%">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="entry,index in entry_list.data" :key="index">
							<td>{{ entry.name }}</td>
							<td>{{ entry.protocol }}</td>
							<td>{{ entry.domain }}</td>
							<td>{{ entry.base_url }}</td>
							<td>{{ entry.search }}</td>
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
	import Pagination from 'laravel-vue-pagination'
	export default {
		data() {
			return {
				entry_list: {},
				entry: {},
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
			app.getEntries()
		},
		methods: {
			getEntries(page) {
				var app = this
				if(typeof page === 'undefined') {
					page = 1
				}
				app.current_page = page
				app.axios.get('/api/v1/partners?page='+page)
				.then(function(resp) {
					app.entry_list = resp.data
					console.log("Partner entry list")
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
				if (confirm("Do you really want to delete it?")) {
					var app = this
					app.axios.delete('/api/v1/partners/' + id)
						.then(function(resp) {
							app.getEntries(app.current_page)
							console.log("Selected Partner deleted.")
						})
						.catch(function(resp) {
							alert("Could not delete Partner.")
						})
				}
			}
		},
	}
</script>