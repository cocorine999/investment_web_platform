@extends('billion.dashboard.include.header')

@section('title','Projects')

@section("content")

            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-xl">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Projects</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>You have total 95 projects.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle"><a href="#"
                                                class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                                data-toggle="dropdown"><em
                                                                    class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered
                                                                    By</span><em
                                                                    class="dd-indc icon ni ni-chevron-right"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><span>Open</span></a></li>
                                                                    <li><a href="#"><span>Closed</span></a></li>
                                                                    <li><a href="#"><span>Onhold</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nk-block-tools-opt"><a href="#" data-target="addProduct"
                                                            class="toggle btn btn-primary"><em
                                                                class="icon ni ni-plus"></em><span>Add
                                                                Project</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head"><a href="/demo6/apps-kanban.html"
                                                            class="project-title">
                                                            <div class="user-avatar sq bg-purple"><span>DD</span></div>
                                                            <div class="project-info">
                                                                <h6 class="title">Dashlite Development</h6><span
                                                                    class="sub-text">Softnio</span>
                                                            </div>
                                                        </a>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="/demo6/apps-kanban.html"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <p>Design and develop the DashLite template for Envato
                                                            Marketplace.</p>
                                                    </div>
                                                    <div class="project-progress">
                                                        <div class="project-progress-details">
                                                            <div class="project-progress-task"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>3
                                                                    Tasks</span></div>
                                                            <div class="project-progress-percent">93.5%</div>
                                                        </div>
                                                        <div class="progress progress-pill progress-md bg-light">
                                                            <div class="progress-bar" data-progress="93.5"></div>
                                                        </div>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><span>A</span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar sm bg-blue"><img
                                                                        src="/demo6/images/avatar/b-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar bg-light sm"><span>+12</span>
                                                                </div>
                                                            </li>
                                                        </ul><span class="badge badge-dim badge-warning"><em
                                                                class="icon ni ni-clock"></em><span>5 Days
                                                                Left</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head"><a href="/demo6/apps-kanban.html"
                                                            class="project-title">
                                                            <div class="user-avatar sq bg-warning"><span>RW</span></div>
                                                            <div class="project-info">
                                                                <h6 class="title">Redesign Website</h6><span
                                                                    class="sub-text">Runnergy</span>
                                                            </div>
                                                        </a>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="/demo6/apps-kanban.html"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <p>Design the website for Runnergy main website including their
                                                            user dashboard.</p>
                                                    </div>
                                                    <div class="project-progress">
                                                        <div class="project-progress-details">
                                                            <div class="project-progress-task"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>25
                                                                    Tasks</span></div>
                                                            <div class="project-progress-percent">23%</div>
                                                        </div>
                                                        <div class="progress progress-pill progress-md bg-light">
                                                            <div class="progress-bar" data-progress="23"></div>
                                                        </div>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><img
                                                                        src="/demo6/images/avatar/c-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar sm bg-blue"><span>N</span></div>
                                                            </li>
                                                        </ul><span class="badge badge-dim badge-light text-gray"><em
                                                                class="icon ni ni-clock"></em><span>21 Days
                                                                Left</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head"><a href="/demo6/apps-kanban.html"
                                                            class="project-title">
                                                            <div class="user-avatar sq bg-info"><span>KR</span></div>
                                                            <div class="project-info">
                                                                <h6 class="title">Keyword Research for SEO</h6><span
                                                                    class="sub-text">Techyspec</span>
                                                            </div>
                                                        </a>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <p>Improve SEO keyword research, A/B testing, Local market
                                                            improvement.</p>
                                                    </div>
                                                    <div class="project-progress">
                                                        <div class="project-progress-details">
                                                            <div class="project-progress-task"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>2
                                                                    Tasks</span></div>
                                                            <div class="project-progress-percent">52.5%</div>
                                                        </div>
                                                        <div class="progress progress-pill progress-md bg-light">
                                                            <div class="progress-bar" data-progress="52.5"></div>
                                                        </div>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><img
                                                                        src="/demo6/images/avatar/a-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                        </ul><span class="badge badge-dim badge-danger"><em
                                                                class="icon ni ni-clock"></em><span>Due
                                                                Tomorrow</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head"><a href="/demo6/apps-kanban.html"
                                                            class="project-title">
                                                            <div class="user-avatar sq bg-danger"><span>WD</span></div>
                                                            <div class="project-info">
                                                                <h6 class="title">Website Development</h6><span
                                                                    class="sub-text">Fitness Next</span>
                                                            </div>
                                                        </a>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="/demo6/apps-kanban.html"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <p>Develop the website using WordPree for the Fitness Next
                                                            client.</p>
                                                    </div>
                                                    <div class="project-progress">
                                                        <div class="project-progress-details">
                                                            <div class="project-progress-task"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>44
                                                                    Tasks</span></div>
                                                            <div class="project-progress-percent">65.5%</div>
                                                        </div>
                                                        <div class="progress progress-pill progress-md bg-light">
                                                            <div class="progress-bar" data-progress="65.5"></div>
                                                        </div>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div class="user-avatar sm bg-blue"><span>N</span></div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><img
                                                                        src="/demo6/images/avatar/c-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                        </ul><span class="badge badge-dim badge-light text-gray"><em
                                                                class="icon ni ni-clock"></em><span>16 Days
                                                                Left</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head"><a href="/demo6/apps-kanban.html"
                                                            class="project-title">
                                                            <div class="user-avatar sq bg-info"><span>KR</span></div>
                                                            <div class="project-info">
                                                                <h6 class="title">Keyword Research for SEO</h6><span
                                                                    class="sub-text">Techyspec</span>
                                                            </div>
                                                        </a>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="/demo6/apps-kanban.html"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <p>Improve SEO keyword research, A/B testing, Local market
                                                            improvement.</p>
                                                    </div>
                                                    <div class="project-progress">
                                                        <div class="project-progress-details">
                                                            <div class="project-progress-task"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>8
                                                                    Tasks</span></div>
                                                            <div class="project-progress-percent">100%</div>
                                                        </div>
                                                        <div class="progress progress-pill progress-md bg-light">
                                                            <div class="progress-bar" data-progress="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><img
                                                                        src="/demo6/images/avatar/a-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><img
                                                                        src="/demo6/images/avatar/d-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                        </ul><span class="badge badge-dim badge-success"><em
                                                                class="icon ni ni-clock"></em><span>Done</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head"><a href="/demo6/apps-kanban.html"
                                                            class="project-title">
                                                            <div class="user-avatar sq bg-purple"><span>DD</span></div>
                                                            <div class="project-info">
                                                                <h6 class="title">Dashlite Development</h6><span
                                                                    class="sub-text">Softnio</span>
                                                            </div>
                                                        </a>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="/demo6/apps-kanban.html"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <p>Design and develop the DashLite template for Envato
                                                            Marketplace.</p>
                                                    </div>
                                                    <div class="project-progress">
                                                        <div class="project-progress-details">
                                                            <div class="project-progress-task"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>3
                                                                    Tasks</span></div>
                                                            <div class="project-progress-percent">93.5%</div>
                                                        </div>
                                                        <div class="progress progress-pill progress-md bg-light">
                                                            <div class="progress-bar" data-progress="93.5"></div>
                                                        </div>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><span>A</span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar sm bg-blue"><img
                                                                        src="/demo6/images/avatar/b-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar bg-light sm"><span>+12</span>
                                                                </div>
                                                            </li>
                                                        </ul><span class="badge badge-dim badge-warning"><em
                                                                class="icon ni ni-clock"></em><span>5 Days
                                                                Left</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head"><a href="/demo6/apps-kanban.html"
                                                            class="project-title">
                                                            <div class="user-avatar sq bg-danger"><span>WD</span></div>
                                                            <div class="project-info">
                                                                <h6 class="title">Website Development</h6><span
                                                                    class="sub-text">Fitness Next</span>
                                                            </div>
                                                        </a>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="/demo6/apps-kanban.html"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <p>Develop the website using WordPree for the Fitness Next
                                                            client.</p>
                                                    </div>
                                                    <div class="project-progress">
                                                        <div class="project-progress-details">
                                                            <div class="project-progress-task"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>44
                                                                    Tasks</span></div>
                                                            <div class="project-progress-percent">65.5%</div>
                                                        </div>
                                                        <div class="progress progress-pill progress-md bg-light">
                                                            <div class="progress-bar" data-progress="65.5"></div>
                                                        </div>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div class="user-avatar sm bg-blue"><span>N</span></div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><img
                                                                        src="/demo6/images/avatar/c-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                        </ul><span class="badge badge-dim badge-light text-gray"><em
                                                                class="icon ni ni-clock"></em><span>16 Days
                                                                Left</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head"><a href="/demo6/apps-kanban.html"
                                                            class="project-title">
                                                            <div class="user-avatar sq bg-warning"><span>RW</span></div>
                                                            <div class="project-info">
                                                                <h6 class="title">Redesign Website</h6><span
                                                                    class="sub-text">Runnergy</span>
                                                            </div>
                                                        </a>
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="/demo6/apps-kanban.html"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Project</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <p>Design the website for Runnergy main website including their
                                                            user dashboard.</p>
                                                    </div>
                                                    <div class="project-progress">
                                                        <div class="project-progress-details">
                                                            <div class="project-progress-task"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>25
                                                                    Tasks</span></div>
                                                            <div class="project-progress-percent">23%</div>
                                                        </div>
                                                        <div class="progress progress-pill progress-md bg-light">
                                                            <div class="progress-bar" data-progress="23"></div>
                                                        </div>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div class="user-avatar sm bg-primary"><img
                                                                        src="/demo6/images/avatar/c-sm.jpg" alt="">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-avatar sm bg-blue"><span>N</span></div>
                                                            </li>
                                                        </ul><span class="badge badge-dim badge-light text-gray"><em
                                                                class="icon ni ni-clock"></em><span>21 Days
                                                                Left</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">New Product</h5>
                                            <div class="nk-block-des">
                                                <p>Add information and add new product.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Product Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-mb-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="regular-price">Regular Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="regular-price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-mb-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale-price">Sale Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="sale-price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-mb-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="stock">Stock</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="stock">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-mb-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="SKU">SKU</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="SKU">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="category">Category</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="category">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Tags</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="tags">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="upload-zone small bg-lighter my-2">
                                                    <div class="dz-message">
                                                        <span class="dz-message-text">Drag and drop file</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-add-product toggle-slide toggle-slide-right toggle-screen-any" id="addProject" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: -24px;">
            <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
            <div class="simplebar-content" style="padding: 24px;">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">New Product</h5>
                                            <div class="nk-block-des">
                                                <p>Add information and add new product.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Product Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-mb-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="regular-price">Regular Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="regular-price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-mb-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale-price">Sale Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="sale-price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-mb-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="stock">Stock</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="stock">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-mb-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="SKU">SKU</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="SKU">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="category">Category</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="category">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Tags</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="tags">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="upload-zone small bg-lighter my-2 dropzone dz-clickable dz-started">
                                                    <div class="dz-message">
                                                        <span class="dz-message-text">Drag and drop file</span>
                                                    </div>
                                                <div class="dz-preview dz-processing dz-error dz-complete dz-image-preview">  <div class="dz-image"><img data-dz-thumbnail="" alt="unnamed (1).png" src="data:image/png;base64,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"></div>  <div class="dz-details">    <div class="dz-size"><span data-dz-size=""><strong>50.1</strong> KB</span></div>    <div class="dz-filename"><span data-dz-name="">unnamed (1).png</span></div>  </div>  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>  <div class="dz-error-message"><span data-dz-errormessage="">Server responded with 0 code.</span></div>  <div class="dz-success-mark">    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">      <title>Check</title>      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>      </g>    </svg>  </div>  <div class="dz-error-mark">    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">      <title>Error</title>      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>        </g>      </g>    </svg>  </div></div></div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->
                                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 806px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 138px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
@endsection