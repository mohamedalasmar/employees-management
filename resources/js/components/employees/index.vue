<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-grey-800">Employees</h1>
        </div>
        <div class="row">
            <div class="card mx-auto">
                <div class="alert alert-success"></div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input
                                            type="search"
                                            class="form-control mb-2"
                                            id="inlineFormInput"
                                            name="search"
                                        />
                                    </div>
                                    <div class="col">
                                        <button
                                            type="submit"
                                            class="btn btn-primary mb-2"
                                        >
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <router-link :to="{name : 'EmployeeCreate'}" class="btn btn-primary mb-2">Create</router-link>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="row">
                                            <div class="col col-sm-6">
                                                <a href="" class="btn btn-info"
                                                    >Edit</a
                                                >
                                            </div>
                                            <div class="col col-sm-6">
                                                <form>
                                                    <button
                                                        type="submit"
                                                        class="
                                                            btn btn-danger
                                                            ml-1
                                                        "
                                                    >
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
