import EmployeesList from './components/employees/list';
import EmployeesCreate from './components/employees/create';
import EmployeesEdit from './components/employees/edit';

export const routes = [
	{
		path: '/employees',
		name: 'EmployeesList',
		component: EmployeesList
	},
	{
		path: '/employees/create',
		name: 'EmployeesCreate',
		component: EmployeesCreate
	},
	{
		path: '/employees/:id/edit',
		name: 'EmployeesEdit',
		component: EmployeesEdit
	}
];