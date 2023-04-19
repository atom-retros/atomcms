<x-housekeeping-layout>
    @push('title', 'Dashboard')

    <div class="fs-2 fw-semibold">Dashboard</div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 text-white bg-primary-gradient">
                <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start" style="height:180px;">
                    <div>
                        <div class="fs-4 fw-semibold">1234</div>
                        <div>Users</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 text-white bg-warning-gradient">
                <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start" style="height:180px;">
                    <div>
                        <div class="fs-4 fw-semibold">43</div>
                        <div>VIP users</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 text-white bg-danger-gradient">
                <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start" style="height:180px;">
                    <div>
                        <div class="fs-4 fw-semibold">15000</div>
                        <div>items in the catalog</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-title fs-4 fw-semibold">Users</div>
                            <div class="card-subtitle text-disabled mb-4">1234 registered users</div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="fw-semibold text-disabled">
                            <tr class="align-middle">
                                <th class="text-center">
                                    <svg class="icon">
                                        <use xlink:href="{{ asset('free.svg') }}#cil-people"></use>
                                    </svg>
                                </th>
                                <th>User</th>
                                <th class="text-center"></th>
                                <th>Motto</th>
                                <th>Last login</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="align-middle">
                                <td class="text-center">
                                    <div class="avatar avatar-md">
                                        <img class="avatar-img"
                                             src="{{ asset('assets/images/housekeeping/dummy-user.png') }}"
                                             alt="user@email.com">
                                        <span class="avatar-status bg-success"></span>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-nowrap">John Doe</div>
                                    <div class="small text-medium-emphasis text-nowrap">Registered: Jan 1, 1970
                                    </div>
                                </td>

                                <td class="text-center">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                                    </svg>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-between">
                                        <div class="float-end ms-1 text-nowrap"><small
                                                class="text-medium-emphasis">Atom HK</small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="fw-semibold text-nowrap">10 sec ago</div>
                                </td>
                            </tr>
                            <tr class="align-middle">
                                <td class="text-center">
                                    <div class="avatar avatar-md">
                                        <img class="avatar-img"
                                             src="{{ asset('assets/images/housekeeping/dummy-user.png') }}"
                                             alt="user@email.com">
                                        <span class="avatar-status bg-success"></span>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-nowrap">John Doe</div>
                                    <div class="small text-medium-emphasis text-nowrap">Registered: Jan 1, 1970
                                    </div>
                                </td>

                                <td class="text-center">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                                    </svg>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-between">
                                        <div class="float-end ms-1 text-nowrap"><small
                                                class="text-medium-emphasis">Atom HK</small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="fw-semibold text-nowrap">10 sec ago</div>
                                </td>
                            </tr>

                            <tr class="align-middle">
                                <td class="text-center">
                                    <div class="avatar avatar-md">
                                        <img class="avatar-img"
                                             src="{{ asset('assets/images/housekeeping/dummy-user.png') }}"
                                             alt="user@email.com">
                                        <span class="avatar-status bg-danger"></span>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-nowrap">John Doe</div>
                                    <div class="small text-medium-emphasis text-nowrap">Registered: Jan 1, 1970
                                    </div>
                                </td>

                                <td class="text-center">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                                    </svg>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-between">
                                        <div class="float-end ms-1 text-nowrap"><small
                                                class="text-medium-emphasis">Atom HK</small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="fw-semibold text-nowrap">10 sec ago</div>
                                </td>
                            </tr>

                            <tr class="align-middle">
                                <td class="text-center">
                                    <div class="avatar avatar-md">
                                        <img class="avatar-img"
                                             src="{{ asset('assets/images/housekeeping/dummy-user.png') }}"
                                             alt="user@email.com">
                                        <span class="avatar-status bg-success"></span>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-nowrap">John Doe</div>
                                    <div class="small text-medium-emphasis text-nowrap">Registered: Jan 1, 1970
                                    </div>
                                </td>

                                <td class="text-center">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                                    </svg>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-between">
                                        <div class="float-end ms-1 text-nowrap"><small
                                                class="text-medium-emphasis">Atom HK</small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="fw-semibold text-nowrap">10 sec ago</div>
                                </td>
                            </tr>

                            <tr class="align-middle">
                                <td class="text-center">
                                    <div class="avatar avatar-md">
                                        <img class="avatar-img"
                                             src="{{ asset('assets/images/housekeeping/dummy-user.png') }}"
                                             alt="user@email.com">
                                        <span class="avatar-status bg-danger"></span>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-nowrap">John Doe</div>
                                    <div class="small text-medium-emphasis text-nowrap">Registered: Jan 1, 1970
                                    </div>
                                </td>

                                <td class="text-center">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                                    </svg>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-between">
                                        <div class="float-end ms-1 text-nowrap"><small
                                                class="text-medium-emphasis">Atom HK</small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="fw-semibold text-nowrap">10 sec ago</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-housekeeping-layout>
