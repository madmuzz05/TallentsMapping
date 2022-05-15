@extends('layouts.admin.app')
  
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col-lg-6">
        <h3>Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Beranda</li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
      <div class="col-lg-6">
      </div>
    </div>
  </div>
</div>        
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-6 col-xl-3 col-lg-6">
                  <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                              <div class="align-self-center text-center"><i data-feather="database"></i></div>
                              <div class="media-body">
                                  <span class="m-0">Earnings</span>
                                  <h4 class="mb-0 counter">6659</h4>
                                  <i class="icon-bg" data-feather="database"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                  <div class="card o-hidden border-0">
                      <div class="bg-secondary b-r-4 card-body">
                          <div class="media static-top-widget">
                              <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                              <div class="media-body">
                                  <span class="m-0">Products</span>
                                  <h4 class="mb-0 counter">9856</h4>
                                  <i class="icon-bg" data-feather="shopping-bag"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                  <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                              <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                              <div class="media-body">
                                  <span class="m-0">Messages</span>
                                  <h4 class="mb-0 counter">893</h4>
                                  <i class="icon-bg" data-feather="message-circle"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                  <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                              <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                              <div class="media-body">
                                  <span class="m-0">New Use</span>
                                  <h4 class="mb-0 counter">4531</h4>
                                  <i class="icon-bg" data-feather="user-plus"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-6 xl-100 box-col-12">
                  <div class="card">
                      <div class="cal-date-widget card-body">
                          <div class="row">
                              <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                                  <div class="cal-info text-center">
                                      <div>
                                          <h2>24</h2>
                                          <div class="d-inline-block"><span class="b-r-dark pe-3">March</span><span class="ps-3">2018</span></div>
                                          <p class="f-16">There is no minimum donation, any sum is appreciated</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                                  <div class="cal-datepicker">
                                      <div class="datepicker-here float-sm-end" data-language="en">           </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
                  <div class="card">
                      <div class="mobile-clock-widget">
                          <div class="bg-svg">
                              <svg class="climacon climacon_cloudLightningMoon" id="cloudLightningMoon" version="1.1" viewBox="15 15 70 70">
                                  <clippath id="moonCloudFillClipfill11">
                                      <path d="M0,0v100h100V0H0z M60.943,46.641c-4.418,0-7.999-3.582-7.999-7.999c0-3.803,2.655-6.979,6.211-7.792c0.903,4.854,4.726,8.676,9.579,9.58C67.922,43.986,64.745,46.641,60.943,46.641z"></path>
                                  </clippath>
                                  <clippath id="cloudFillClipfill19">
                                      <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"></path>
                                  </clippath>
                                  <g class="climacon_iconWrap climacon_iconWrap-cloudLightningMoon">
                                      <g clip-path="url(#cloudFillClip)">
                                          <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud" clip-path="url(#moonCloudFillClip)">
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z"></path>
                                          </g>
                                      </g>
                                      <g class="climacon_wrapperComponent climacon_wrapperComponent-lightning">
                                          <polygon class="climacon_component climacon_component-stroke climacon_component-stroke_lightning" points="48.001,51.641 57.999,51.641 52,61.641 58.999,61.641 46.001,77.639 49.601,65.641 43.001,65.641 "></polygon>
                                      </g>
                                      <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">
                                          <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M59.999,65.641c-0.28,0-0.649,0-1.062,0l3.584-4.412c3.182-1.057,5.478-4.053,5.478-7.588c0-4.417-3.581-7.998-7.999-7.998c-1.602,0-3.083,0.48-4.333,1.29c-1.231-5.316-5.974-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,12c0,5.446,3.632,10.039,8.604,11.503l-1.349,3.777c-6.52-2.021-11.255-8.098-11.255-15.282c0-8.835,7.163-15.999,15.998-15.999c6.004,0,11.229,3.312,13.965,8.204c0.664-0.114,1.338-0.205,2.033-0.205c6.627,0,11.999,5.371,11.999,11.999C71.999,60.268,66.626,65.641,59.999,65.641z"></path>
                                      </g>
                                  </g>
                              </svg>
                          </div>
                          <div>
                              <ul class="clock" id="clock">
                                  <li class="hour" id="hour"></li>
                                  <li class="min" id="min"></li>
                                  <li class="sec" id="sec"></li>
                              </ul>
                              <div class="date f-24 mb-2" id="date"><span id="monthDay"></span><span id="year">, </span></div>
                              <div>
                                  <p class="m-0 f-14 text-light">kolkata, India                                            </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
                  <div class="card">
                      <div class="weather-widget-two">
                          <div class="card-body">
                              <div class="media">
                                  <svg class="climacon climacon_cloudDrizzleMoonAlt" id="cloudDrizzleMoonAlt" version="1.1" viewBox="15 15 70 70">
                                      <clippath id="cloudFillClip">
                                          <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"></path>
                                      </clippath>
                                      <clippath id="moonCloudFillClip">
                                          <path d="M0,0v100h100V0H0z M60.943,46.641c-4.418,0-7.999-3.582-7.999-7.999c0-3.803,2.655-6.979,6.211-7.792c0.903,4.854,4.726,8.676,9.579,9.58C67.922,43.986,64.745,46.641,60.943,46.641z"></path>
                                      </clippath>
                                      <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleMoonAlt">
                                          <g clip-path="url(#cloudFillClip)">
                                              <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud" clip-path="url(#moonCloudFillClip)">
                                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z"></path>
                                              </g>
                                          </g>
                                          <g class="climacon_wrapperComponent climacon_wrapperComponent-drizzle">
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" id="Drizzle-Left_1_" d="M56.969,57.672l-2.121,2.121c-1.172,1.172-1.172,3.072,0,4.242c1.17,1.172,3.07,1.172,4.24,0c1.172-1.17,1.172-3.07,0-4.242L56.969,57.672z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M50.088,57.672l-2.119,2.121c-1.174,1.172-1.174,3.07,0,4.242c1.17,1.172,3.068,1.172,4.24,0s1.172-3.07,0-4.242L50.088,57.672z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M43.033,57.672l-2.121,2.121c-1.172,1.172-1.172,3.07,0,4.242s3.07,1.172,4.244,0c1.172-1.172,1.172-3.07,0-4.242L43.033,57.672z"></path>
                                          </g>
                                          <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud" clip-path="url(#cloudFillClip)">
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M59.943,41.642c-0.696,0-1.369,0.092-2.033,0.205c-2.736-4.892-7.961-8.203-13.965-8.203c-8.835,0-15.998,7.162-15.998,15.997c0,5.992,3.3,11.207,8.177,13.947c0.276-1.262,0.892-2.465,1.873-3.445l0.057-0.057c-3.644-2.061-6.106-5.963-6.106-10.445c0-6.626,5.372-11.998,11.998-11.998c5.691,0,10.433,3.974,11.666,9.29c1.25-0.81,2.732-1.291,4.332-1.291c4.418,0,8,3.581,8,7.999c0,3.443-2.182,6.371-5.235,7.498c0.788,1.146,1.194,2.471,1.222,3.807c4.666-1.645,8.014-6.077,8.014-11.305C71.941,47.014,66.57,41.642,59.943,41.642z"></path>
                                          </g>
                                      </g>
                                  </svg>
                                  <!-- cloudDrizzleMoonAlt-->
                                  <div class="media-body align-self-center text-white">
                                      <h4 class="m-0 f-w-600 num">25°C</h4>
                                      <p class="m-0 f-14">Newyork</p>
                                  </div>
                              </div>
                              <div class="media">
                                  <svg class="climacon climacon_cloudRainMoon" id="cloudRainMoon" version="1.1" viewBox="15 15 70 70">
                                      <clippath id="cloudFillClip1">
                                          <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"></path>
                                      </clippath>
                                      <clippath id="moonCloudFillClip1">
                                          <path d="M0,0v100h100V0H0z M60.943,46.641c-4.418,0-7.999-3.582-7.999-7.999c0-3.803,2.655-6.979,6.211-7.792c0.903,4.854,4.726,8.676,9.579,9.58C67.922,43.986,64.745,46.641,60.943,46.641z"></path>
                                      </clippath>
                                      <g class="climacon_iconWrap climacon_iconWrap-cloudRainMoon">
                                          <g clip-path="url(#cloudFillClip1)">
                                              <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud" clip-path="url(#moonCloudFillClip1)">
                                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z"></path>
                                              </g>
                                          </g>
                                          <g class="climacon_wrapperComponent climacon_wrapperComponent-rain">
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z"></path>
                                          </g>
                                          <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud" clip-path="url(#cloudFillClip1)">
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M59.943,41.642c-0.696,0-1.369,0.092-2.033,0.205c-2.736-4.892-7.961-8.203-13.965-8.203c-8.835,0-15.998,7.162-15.998,15.997c0,5.992,3.3,11.207,8.177,13.947c0.276-1.262,0.892-2.465,1.873-3.445l0.057-0.057c-3.644-2.061-6.106-5.963-6.106-10.445c0-6.626,5.372-11.998,11.998-11.998c5.691,0,10.433,3.974,11.666,9.29c1.25-0.81,2.732-1.291,4.332-1.291c4.418,0,8,3.581,8,7.999c0,3.443-2.182,6.371-5.235,7.498c0.788,1.146,1.194,2.471,1.222,3.807c4.666-1.645,8.014-6.077,8.014-11.305C71.941,47.014,66.57,41.642,59.943,41.642z"></path>
                                          </g>
                                      </g>
                                  </svg>
                                  <!-- cloudRainMoon-->
                                  <div class="media-body align-self-center text-white">
                                      <h4 class="m-0 f-w-600 num">95°F</h4>
                                      <p class="m-0 f-14">Peris</p>
                                  </div>
                              </div>
                              <div class="media">
                                  <svg class="climacon climacon_cloudDrizzle" id="cloudDrizzle" version="1.1" viewBox="15 15 70 70">
                                      <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzle">
                                          <g class="climacon_wrapperComponent climacon_wrapperComponent-drizzle">
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" d="M42.001,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2.001-0.895-2.001-2v-3.998C40,54.538,40.896,53.644,42.001,53.644z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M49.999,53.644c1.104,0,2,0.896,2,2v4c0,1.104-0.896,2-2,2s-1.998-0.896-1.998-2v-4C48.001,54.54,48.896,53.644,49.999,53.644z"></path>
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M57.999,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2-0.895-2-2v-3.998C55.999,54.538,56.894,53.644,57.999,53.644z"></path>
                                          </g>
                                          <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M63.999,64.944v-4.381c2.387-1.386,3.998-3.961,3.998-6.92c0-4.418-3.58-8-7.998-8c-1.603,0-3.084,0.481-4.334,1.291c-1.232-5.316-5.973-9.29-11.664-9.29c-6.628,0-11.999,5.372-11.999,12c0,3.549,1.55,6.729,3.998,8.926v4.914c-4.776-2.769-7.998-7.922-7.998-13.84c0-8.836,7.162-15.999,15.999-15.999c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.336-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12C71.997,58.864,68.655,63.296,63.999,64.944z"></path>
                                          </g>
                                      </g>
                                  </svg>
                                  <!-- cloudDrizzle-->
                                  <div class="media-body align-self-center text-white">
                                      <h4 class="m-0 f-w-600 num">50°C</h4>
                                      <p class="m-0 f-14">India</p>
                                  </div>
                              </div>
                              <div class="top-bg-whether">
                                  <svg class="climacon climacon_cloudHailAltFill" id="cloudHailAltFill" version="1.1" viewBox="15 15 70 70">
                                      <g class="climacon_iconWrap climacon_iconWrap-cloudHailAltFill">
                                          <g class="climacon_wrapperComponent climacon_wrapperComponent-hailAlt">
                                              <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                                  <circle cx="42" cy="65.498" r="2"></circle>
                                              </g>
                                              <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                                  <circle cx="49.999" cy="65.498" r="2"></circle>
                                              </g>
                                              <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                                  <circle cx="57.998" cy="65.498" r="2"></circle>
                                              </g>
                                              <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                                  <circle cx="42" cy="65.498" r="2"></circle>
                                              </g>
                                              <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                                  <circle cx="49.999" cy="65.498" r="2"></circle>
                                              </g>
                                              <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                                  <circle cx="57.998" cy="65.498" r="2"></circle>
                                              </g>
                                          </g>
                                          <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z"></path>
                                              <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z"></path>
                                          </g>
                                      </g>
                                  </svg>
                              </div>
                              <div class="bottom-whetherinfo">
                                  <div class="row">
                                      <div class="col-6"><i data-feather="cloud-drizzle"></i></div>
                                      <div class="col-6">
                                          <div class="whether-content">
                                              <span>India, Surat</span>
                                              <h4 class="num mb-0">36°F                                    </h4>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-md-6 col-sm-12">
                  <div class="card browser-widget">
                      <div class="media card-body">
                          <div class="media-img"><img src="{{asset('assets/images/dashboard/chrome.png')}}" alt=""></div>
                          <div class="media-body align-self-center">
                              <div>
                                  <p>Daily </p>
                                  <h4><span class="counter">36</span>%</h4>
                              </div>
                              <div>
                                  <p>Month </p>
                                  <h4><span class="counter">96</span>%</h4>
                              </div>
                              <div>
                                  <p>Week </p>
                                  <h4><span class="counter">46</span>%</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-md-6 col-sm-12">
                  <div class="card browser-widget">
                      <div class="media card-body">
                          <div class="media-img"><img src="{{asset('assets/images/dashboard/firefox.png')}}" alt=""></div>
                          <div class="media-body align-self-center">
                              <div>
                                  <p>Daily </p>
                                  <h4><span class="counter">36</span>%</h4>
                              </div>
                              <div>
                                  <p>Month </p>
                                  <h4><span class="counter">96</span>%</h4>
                              </div>
                              <div>
                                  <p>Week </p>
                                  <h4><span class="counter">46</span>%</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-md-12 col-sm-12">
                  <div class="card browser-widget">
                      <div class="media card-body">
                          <div class="media-img"><img src="{{asset('assets/images/dashboard/safari.png')}}" alt=""></div>
                          <div class="media-body align-self-center">
                              <div>
                                  <p>Daily </p>
                                  <h4><span class="counter">36</span>%</h4>
                              </div>
                              <div>
                                  <p>Month </p>
                                  <h4><span class="counter">96</span>%</h4>
                              </div>
                              <div>
                                  <p>Week </p>
                                  <h4><span class="counter">46</span>%</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

            <!-- Container-fluid Ends-->
@endsection