@extends('backend/layout')
@section('title')
    dashboard
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Dashboard</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-sx-6">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <span class="label label-primary">120% +</span>
              <h3 class="panel-title">Sales</h3>
            </div>
            <div class="panel-body">
              <div class="daily-stats">
                <h1 class="number">$4595</h1>
                <p class="avg">Total Sale</p>
                <ul class="details">
                  <li>
                    <h4 class="num">1239</h4>
                    <small>Customers</small>
                  </li>
                  <li>
                    <h4 class="num">125</h4>
                    <small>Products</small>
                  </li>
                  <li>
                    <h4 class="num">2295</h4>
                    <small>Orders</small>
                  </li>
                </ul>
              </div>
            </div>
            <div class="panel-footer clearfix">
              <a href="#" class="pull-left">View more...</a>
              <span class="pull-right" id="sales"></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-sx-6">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <span class="label label-primary">35% +</span>
              <h3 class="panel-title">Products</h3>
            </div>
            <div class="panel-body">
              <div class="daily-stats">
                <h1 class="number primary">7692</h1>
                <p class="avg">Total Products</p>
                <div class="progress progress-small">
                  <div class="progress-bar progress-bar-success" style="width: 40%">
                  </div>
                  <div class="progress-bar progress-bar-primary" style="width: 60%">
                  </div>
                </div>
                <ul class="min-max">
                  <li>
                    <h4 class="num"><small>Min</small>2579</h4>
                  </li>
                  <li>
                    <h4 class="num"><small>Max</small>4475</h4>
                  </li>
                </ul>
              </div>
            </div>
            <div class="panel-footer clearfix">
              <a href="#" class="pull-left">View more...</a>
              <span class="pull-right" id="products"></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-sx-6">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <span class="label label-warning">45% +</span>
              <h3 class="panel-title">Conversion Rate</h3>
            </div>
            <div class="panel-body">
              <div class="daily-stats">
                <h1 class="number primary">1.989%</h1>
                <p class="avg">Average</p>
                <div class="bar-graph" id="conversion-graph">&nbsp;</div>
              </div>
            </div>
            <div class="panel-footer clearfix">
              <a href="#" class="pull-left">View more...</a>
              <span class="pull-right" id="conversion-rate"></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-sx-6">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <span class="label label-primary">90% +</span>
              <h3 class="panel-title">Users Demography</h3>
            </div>
            <div class="panel-body">
              <div class="daily-stats">
                <h1 class="number primary">3295</h1>
                <p class="avg">Average</p>
                <ul class="demography">
                  <li>
                    <i class="icon-male"></i>
                    <h4 class="num">47239 <small>Male</small></h4>
                  </li>
                  <li>
                    <i class="icon-female"></i>
                    <h4 class="num">21925 <small>Female</small></h4>
                  </li>
                </ul>
              </div>
            </div>
            <div class="panel-footer clearfix">
              <a href="#" class="pull-left">View more...</a>
              <span class="pull-right" id="new-users"></span>
            </div>
          </div>
        </div>
 </div>
<!-- Row end -->
<!-- Row start -->
<div class="row">
        <div class="col-md-12 col-sx-12 col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <i class="icon-twitter"></i>
              <h3 class="panel-title">Top 5 Users</h3>
            </div>
            <div class="panel-sub-heading">
              <a href="#">Last week chart</a>
            </div>
            <div class="panel-body">
              <div class="tweets-container">

                <div class="tweet-box">
                  <img class="avatar" alt="" src="./img/avatar-2.png" />
                  <div class="tweet">
                    <p>
                      <span>@sri</span> mentioned you
                    </p>
                    <p>
                      <span>@ha haa</span> Cultivate synergies?
                    </p>
                    <div class="icons-nav clearfix">
                      <span class="time">2mins ago</span>
                      <i class="icon-trash"></i>
                    </div>
                  </div>
                </div>
                
                <div class="tweet-box">
                  <img class="avatar" alt="" src="./img/avatar-1.png" />
                  <div class="tweet">
                    <p>
                      <span>@sandy</span> mentioned you
                    </p>
                    <p>
                      <span>@ha haa</span> Latform cultivate?
                    </p>
                    <div class="icons-nav clearfix">
                      <span class="time">9 hours ago</span>
                      <i class="icon-trash"></i>
                    </div>
                  </div>
                </div>
                
                <div class="tweet-box no-margin">
                  <img class="avatar" alt="" src="./img/avatar-3.png" />
                  <div class="tweet">
                    <p>
                      <span>@haasini</span> mentioned you
                    </p>
                    <p>
                      <span>@ha haa</span> Eyeballs atformsvate?
                    </p>
                    <div class="icons-nav clearfix">
                      <span class="time">3 days ago</span>
                      <i class="icon-trash"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Row end -->
	  <!-- Row start -->
	  <div class="row">
        <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <i class="icon-tag"></i>
              <h3 class="panel-title">Feeds</h3>
            </div>
            <div class="panel-body">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                  <a href="#activites" data-toggle="tab" data-original-title="">Activites</a>
                </li>
                <li class="">
                  <a href="#signups" data-toggle="tab" data-original-title="">Signups</a>
                </li>
                <li class="">
                  <a href="#online" data-toggle="tab" data-original-title="">Online</a>
                </li>
              </ul>
              <br />
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="activites">
                  <div id="scrollbar">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="viewport">
                      <div class="overview">
                        <div class="featured-articles">
                          <div class="articles">
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Raw denim you probably
                              <span class="date">12th Nov @1:45am  / 8 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Reprehenderit butcher
                              <span class="date">11th Nov @3:21pm  / 21 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Skateboard dolor brunch
                              <span class="date">11th Nov @11:19am  / 15 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              accusam  / 3 Commentsus terry richardson
                              <span class="date">10th Nov @8:12am  / 13 Comments</span>

                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Mashups experiences
                              <span class="date">09th Nov @1:59pm  / 12 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Terry richardson ad squid
                              <span class="date">6th Nov @10:44am  / 16 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Reinvent cutting
                              <span class="date">2nd Nov @11:19am  / 1 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              partnerships 24/7
                              <span class="date">2nd Nov @11:19am  / 19 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Eyeballs frictionless
                              <span class="date">1st Nov @9:19am  / 21 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Deliver innovate
                              <span class="date">1st Nov @8:19pm  / 11 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Portals technologies
                              <span class="date">29th Oct @12:19am  / 7 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Collaborative innovate
                              <span class="date">29th Oct @3:31am  / 5 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Mashups experiences
                              <span class="date">27th Oct @12:19am  / 2 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Need some interesting
                              <span class="date">26th Oct @2:33am  / 9 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Portals technologies
                              <span class="date">25th Oct @9:37pm  / 3 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Collaborative innovate
                              <span class="date">25th Oct @12:19am  / 7 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Mashups experiences
                              <span class="date">23rd Oct @8:39am  / 43 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              B2B plug and play
                              <span class="date">22nd Oct @7:19pm  / 21 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Need interesting
                              <span class="date">20th Oct @1:19am  / 13 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Portals technologies
                              <span class="date">20th Oct @6:55am  / 22 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Collaborative innovate
                              <span class="date">19th Oct @9:47am  / 36 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Portals technologies
                              <span class="date">17th Oct @3:57pm  / 4 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Collaborative innovate
                              <span class="date">16th Oct @12:19am  / 8 Comments</span>
                            </a>
                            <a href="#">
                              <span class="label-bullet">
                                &nbsp;
                              </span>
                              Mashups experiences
                              <span class="date">12th Oct @8:22am  / 1 Comments</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="signups">
                  <ul class="signups">
                    <li>
                      <div class="user pull-left">
                        <img src="./img/avatar-2.png" alt="user" />
                      </div>
                      <div class="info">
                        <h6>Sandy</h6>
                        <p class="designation">Graphic Designer</p>
                      </div>
                    </li>
                    <li>
                      <div class="user pull-left">
                        <img src="./img/avatar-1.png" alt="user" />
                      </div>
                      <div class="info">
                        <h6>Srinu Basava</h6>
                        <p class="designation">UI Designer</p>
                      </div>
                    </li>
                    <li>
                      <div class="user pull-left">
                        <img src="./img/avatar-3.png" alt="user" />
                      </div>
                      <div class="info">
                        <h6>Honey</h6>
                        <p class="designation">Haker</p>
                      </div>
                    </li>
                    <li>
                      <div class="user pull-left">
                        <img src="./img/avatar-4.png" alt="user" />
                      </div>
                      <div class="info">
                        <h6>Rahul Dravid</h6>
                        <p class="designation">Senior Developer</p>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="online">
                  <ul class="online-users">
                    <li>
                      <a href="./index.html" data-lastname="Sandy" data-status="online">
                        <span>Sandy</span>
                        <div class="user-status online"></div>
                      </a>
                    </li>
                    <li>
                      <a href="./index.html" data-lastname="Srinu Basava" data-status="online">
                        <span>Srinu</span>
                        <div class="user-status online"></div>
                      </a>
                    </li>
                    <li>
                      <a href="./index.html" data-lastname="John Doe" data-status="online">
                        <span>John Doe</span>
                        <div class="user-status busy"></div>
                      </a>
                    </li>
                    <li>
                      <a href="./index.html" data-lastname="Steve Waugh" data-status="online">
                        <span>Steve Waugh</span>
                        <div class="user-status away"></div>
                      </a>
                    </li>
                    <li>
                      <a href="./index.html" data-lastname="Robin Fleming" data-status="online">
                        <span>Robin Fleming</span>
                        <div class="user-status away"></div>
                      </a>
                    </li>
                    <li>
                      <a href="./index.html" data-lastname="Mr. Black" data-status="online">
                        <span>Mr. Black</span>
                        <div class="user-status"></div>
                      </a>
                    </li>
                    <li>
                      <a href="./index.html" data-lastname="Batman" data-status="online">
                        <span>Batman</span>
                        <div class="user-status"></div>
                      </a>
                    </li>
                    <li>
                      <a href="./index.html" data-lastname="Shameera" data-status="online">
                        <span>Shameera</span>
                        <div class="user-status"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Row end -->
@endsection