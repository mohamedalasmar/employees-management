import EmployeeIndex from "./components/employees/index";
import EmployeeCreate from "./components/employees/create";
import EmployeeEdit from "./components/employees/edit";

export const routes = [
    {
        path: "/employees",
        name: "EmployeeIndex",
        component: EmployeeIndex,
    },
    {
        path: "/employees/create",
        name: "EmployeeCreate",
        component: EmployeeCreate,
    },
    {
        path: "/employees/:id/edit",
        name: "EmployeeEdit",
        component: EmployeeEdit,
    },
];
