import Vue from 'vue'
import VueRouter from 'vue-router'
import Example from '../components/Example.vue'
import Mapper from '../components/views/PartnerFieldTransforms_CRUD/Mapper.vue'
import PartnerPicker from '../components/views/PartnerFieldTransforms_CRUD/PartnerPicker.vue'
import PartnerFieldTransforms from '../components/views/PartnerFieldTransforms_CRUD/Index.vue'
import Partner from '../components/views/Partner_CRUD/Index.vue'
import PartnerFields from '../components/views/PartnerFields_CRUD/Index.vue'
import PartnerValueMaps from '../components/views/PartnerValueMaps_CRUD/Index.vue'

Vue.use(VueRouter)

export default new VueRouter({
	mode: 'history',
	routes: [
		{
			name: 'Example',
			path: '/',
			component: Example,
		},
		{
			name: 'Mapper',
			path: '/mapper',
			component: Mapper,
			children: [
				{
					name: 'PartnerPicker',
					path: 'partner-picker',
					component: PartnerPicker,
				},
				{
					name: 'PartnerFieldTransforms',
					path: 'partner-fields-mapper',
					component: PartnerFieldTransforms,
				},
			]
		},
		{
			name: 'Partner',
			path: '/partner',
			component: Partner,
		},
		{
			name: 'PartnerFields',
			path: '/partnerfields',
			component: PartnerFields,
		},
		{
			name: 'PartnerValueMaps',
			path: '/partnervaluemaps',
			component: PartnerValueMaps,
		},
	]
})