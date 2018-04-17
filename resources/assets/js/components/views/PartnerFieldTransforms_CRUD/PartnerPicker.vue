<template>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">
					<label class="control-label" for="left_partner">Left Partner:</label>
					<select
						class="form-control input-lg"
						v-model="left_partner">
						<option v-for="partner in partner_list" v-if="right_partner!=partner.id" :value="partner.id" :key="partner.id">{{partner.name}}</option>		
					</select>
				</div>
				<div class="form-group">
					<label class="control-label" for="right_partner">Right Partner:</label>
					<select
						class="form-control input-lg"
						v-model="right_partner">
						<option v-for="partner in partner_list" v-if="left_partner!=partner.id" :value="partner.id" :key="partner.id">{{partner.name}}</option>		
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-lg" @click="next()">Next</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		name: 'PartnerPicker',
		data() {
			return {
				left_partner: null,
				right_partner: null,
				partner_list: [],
			}
		},
		methods: {
			next: function(){
				var app = this
				app.$router.replace({name: "PartnerFieldTransforms", query: {partner_id_left:app.left_partner, partner_id_right:app.right_partner}})
			},
		},
		mounted() {
			var app = this
			app.axios.get('/api/v1/partners')
				.then(function(resp) {
					app.partner_list = resp.data
					app.left_partner = app.partner_list[0].id
					app.right_partner = app.partner_list[1].id
					console.log("Get all partners.")
					console.log(resp.data)
				})
				.catch(function(resp) {
					console.log(resp)
					alert("Could not load partners")
				})
		},
	}
</script>