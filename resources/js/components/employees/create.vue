<template>
	<div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				
				<div class="d-flex justify-content-between">
					<h3>Create Employee</h3>
					<h3>
						<router-link 
						:to="{name:'EmployeesList'}"
						class="btn btn-primary btn-sm">
						<i class="fas fa-arrow-left"></i> Go Back
					</router-link>
				</h3>
			</div>
			<form @submit.prevent="storeEmployee">
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input class="form-control" id="first_name" type="text" v-model="form.first_name">
				</div>
				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input class="form-control" id="last_name" type="text" v-model="form.last_name">
				</div>
				<div class="form-group">
					<label for="middle_name">Middle Name</label>
					<input class="form-control" id="middle_name" type="text" v-model="form.middle_name">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input class="form-control" id="address" type="text" v-model="form.address">
				</div>

				<div class="form-group">
					<label for="department">Department</label>
					<select class="form-control" id="department" v-model="form.department_id">
						<option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
					</select>
					{{form.department_id}}
				</div>
				<div class="form-group">
					<label for="country">Country</label>
					<select class="form-control" id="country" v-model="form.country_id" @change="getStates()">
						<option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option>
					</select>
					{{form.country_id}}
				</div>
				<div class="form-group">
					<label for="state">State</label>
					<select class="form-control" id="state" v-model="form.state_id" @change="getCities()">
						<option :disabled="form.country_id==null" v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
					</select>
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<select class="form-control" id="city" v-model="form.city_id">
						<option :disabled="form.state_id==null" v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
					</select>
				</div>
				<div class="form-group">
					<label for="zip_code">Zip Code</label>
					<input class="form-control" id="zip_code" type="number" v-model="form.zip_code">
				</div>
				<div class="form-group">
					<label for="birthdate">Birthdate</label>
					<input class="form-control" for="birthdate" type="date" v-model="form.birthdate">
				</div>
				<div class="form-group">
					<label for="date_hired">Hire Date</label>
					<input class="form-control" id="date_hired" type="date" v-model="form.date_hired">
				</div>
				<button type="submit" class="btn btn-success btn-sm">Add Country</button>      
			</form>
		</div>
	</div>
</div>
</template>
<script>
	export default{
		data(){
			return {
				countries: [],
				states: [],
				cities: [],
				departments: [],
				form:{
					first_name:'',
					last_name:'',
					middle_name:'',
					address:'',
					department_id:'',
					country_id:'',
					state_id:'',
					city_id:'',
					zip_code:'',
					birthdate:null,
					date_hired:null,
				}
			}
		},
		created(){
			this.getCountries();
			this.getDepartments();
		},
		methods: {
			getCountries(){
				axios.get('/api/employees/countries')
				.then(res=>{
					this.countries = res.data
				}).catch(error=>{
					console.log(error)
				})
			},
			getStates(){
				axios.get('/api/employees/'+this.form.country_id+'/states')
				.then(res=>{
					this.states = res.data
				}).catch(error=>{
					console.log(error)
				})
			},
			getCities(){
				axios.get('/api/employees/'+this.form.state_id+'/cities')
				.then(res=>{
					this.cities = res.data
				}).catch(error=>{
					console.log(error)
				})
			},
			getDepartments(){
				axios.get('/api/employees/departments')
				.then(res=>{
					this.departments = res.data
				})
				.catch(error=>{
					console.log(error)
				})
			},
			storeEmployee(){
				axios.post('/api/employees/store',{
					'first_name': this.form.first_name,
					'last_name': this.form.last_name,
					'middle_name': this.form.middle_name,
					'address': this.form.address,
					'department_id': this.form.department_id,
					'country_id': this.form.country_id,
					'state_id': this.form.state_id,
					'city_id': this.form.city_id,
					'zip_code': this.form.zip_code,
					'birthdate': this.form.birthdate,
					'date_hired': this.form.date_hired,
				})
				.then(res=>{
					this.form.first_name = '';
					this.form.last_name = '';
					this.form.middle_name = '';
					this.form.address = '';
					this.form.department_id = '';
					this.form.country_id = '';
					this.form.state_id = '';
					this.form.city_id = '';
					this.form.zip_code = '';
					this.form.birthdate = null;
					this.form.date_hired = null;
					this.$router.push({name: 'EmployeesList'});
				})
				
			}
		}
	}
</script>