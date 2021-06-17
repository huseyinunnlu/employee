<template>
	<div>
		<div class="container">
			<h3 class="col-md-12">Employees
				<router-link :to="{name:'EmployeesCreate'}" class="btn btn-success btn-sm">Create</router-link>
			</h3>
			<div class="d-flex justify-content-center justify-content-between">
				<div class="col-md-8">
					<div v-if="showMessage==true" class="alert-success p-2 mt-2 mb-2">
						<span>{{message}}</span>
					</div>	
					<div class="card">
						<div class="card-body p-0">
							<form>
								<div class="form-group d-flex">
									<input type="text" placeholder="Search Country By Name and Code" class="form-control form-control-sm" v-model.lazy="search">
									<select v-model="selected" class="form-control form-control-sm">
										<option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
									</select>
									<a type="button"" class="btn-sm btn btn-info">Reset</a>
								</div> 
							</form>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">First Name</th>
										<th scope="col">Last Name</th>
										<th scope="col">Adress</th>
										<th scope="col">Department</th>
										<th scope="col">Manage</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="employee in employees" :key="employee.id">
										<th scope="row" v-text="employee.id"></th>
										<td v-text="employee.first_name"></td>
										<td v-text="employee.last_name"></td>
										<td v-text="employee.address"></td>
										<td>{{employee.department.name}} <span class="badge badge-primary">{{employee.department.id}}</span></td>
										<td>
											<router-link 
											:to="{
												name: 'EmployeesEdit',
												params :{id:employee.id}
											}" 
											class="btn btn-primary btn-sm">
											<i class="fas fa-pen"></i>
										</router-link>
										<button @click="deleteEmployee(employee.id)" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script>
	export default{
		data(){
			return{
				employees:[],
				showMessage: false,
				message:'',
				selected:null,
				search:null,
				departments:[],
			}
		},
		created() {
			this.getEmployees();
			this.getDepartments();
		},
		watch: {
			search(){
				this.getEmployees();
			},
			selected(){
				this.getEmployees();
			}
		},
		methods:{	
			getEmployees(){
				axios.get('/api/employees', {
					params: {
						search: this.search,
						department_id: this.selected,
					}
				})
				.then(res => {
					this.employees = res.data
				})
				.catch(err => {
					console.log(err)
				})
			},
			deleteEmployee(id){
				axios.delete('api/employees/'+id+'/delete')
				.then(res=>{
					this.showMessage = true;
					this.message = res.data;
					this.getEmployees();
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
		}	
	}
</script>