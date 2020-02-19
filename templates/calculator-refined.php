<div class="calculator" ng-app="CalcApp">
  <div class="banner" style="background-image: url('<?= the_post_thumbnail_url('full') ?>')">
    <div class="overlay">
      <h1><?= the_title() ?></h1>
    </div>
  </div>
  <div class="calc-container" ng-controller="CalcController as ctrl">
    <div class="calc-header">
      <div class="progress">
        <div class="current-progress"></div>
        <div id="company" class="step complete"><a href="#slide-1">Company</a><div class="circle"></div></div>
        <div id="revenue" class="step"><a href="#slide-2">Revenue</a><div class="circle"></div></div>
        <div id="orderValue" class="step"><a href="#slide-3">Order Value</a><div class="circle"></div></div>
        <div id="error" class="step"><a href="#slide-4">Error Rates</a><div class="circle"></div></div>
        <div id="team" class="step"><a href="#slide-5">Team</a><div class="circle"></div></div>
        <div id="benefits" class="step"><a href="#slide-6">Benefits</a><div class="circle"></div></div>
        <div id="results" class="step"><a href="#slide-7">Results</a><div class="circle"></div></div>
      </div>
    </div>
    <div class="total">
      <div class="revIncrease">
        <h2>+$<span id="revTest">0</span></h2>
        <p>Total Revenue Increase</p>
      </div>
      <div class="marginIncrease">
        <h2>+$<span id="marginTest">0</span></h2>
        <p>Gross Margin Increase</p>
      </div>
    </div>
    <div class="gray-bg"></div>

    <div id="slide-1" class="slide">
      <div class="left">
        <section id="industry-question" class="slide-section">
          <h2>In what <b>industry</b> is your business?</h2>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="consumer" class="tile-radio" type="radio" ng-model="data.industry" value="consumer" />
              <label for="consumer">
                <svg id="bags" viewBox="0 0 118.45 107.6">
                  <defs><style>.cls-3{fill:#0b6db6;}.cls-4{fill:#e2704d;}</style></defs>
                  <path class="cls-3" d="M51.16,105.2a2.38,2.38,0,0,0-2.39-2.39H15.39A10.6,10.6,0,0,1,4.81,92.22v-69h14.5v9a2.39,2.39,0,1,0,4.78,0v-9H52.93v9a2.39,2.39,0,1,0,4.78,0v-9h14.5v4.71a2.39,2.39,0,1,0,4.79,0v-7.1a2.38,2.38,0,0,0-2.39-2.39H57.69a19.2,19.2,0,0,0-38.38,0H2.39A2.38,2.38,0,0,0,0,20.83V92.22A15.38,15.38,0,0,0,15.37,107.6H48.75a2.4,2.4,0,0,0,2.42-2.39M38.5,4.78A14.46,14.46,0,0,1,52.9,18.44H24.1A14.46,14.46,0,0,1,38.5,4.78" />
                  <path class="cls-4" d="M71.49,48.17V50.9H58.32a2.38,2.38,0,0,0-2.39,2.39v42a12.3,12.3,0,0,0,12.3,12.3h37.92a12.3,12.3,0,0,0,12.3-12.3v-42a2.38,2.38,0,0,0-2.39-2.39H102.88V48.17a15.7,15.7,0,1,0-31.39,0m29,15.85a2.38,2.38,0,0,0,2.39-2.39V55.68h10.78V95.27a7.52,7.52,0,0,1-7.52,7.52H68.23a7.52,7.52,0,0,1-7.52-7.52V55.68H71.49v5.94a2.39,2.39,0,1,0,4.78,0V55.68H98.1v5.94A2.38,2.38,0,0,0,100.49,64M98.1,48.17V50.9H76.27V48.17a10.91,10.91,0,1,1,21.82,0" />
                </svg>
                <p>Consumer Products</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="distribution" class="tile-radio" type="radio" ng-model="data.industry" value="distribution" />
              <label for="distribution">
                <svg id="truck" viewBox="0 0 150.89 102.57">
                  <defs><style>.cls-3{fill:#026cb6;}.cls-4{fill:#e2704d;}</style></defs>
                  <path class="cls-3" d="M123.67,75.69a13.53,13.53,0,0,0-9.56,3.94,13.26,13.26,0,0,0,0,19,13.63,13.63,0,0,0,9.56,3.94,13.44,13.44,0,0,0,0-26.87m0,21.65a8.21,8.21,0,1,1,0-16.41,8.21,8.21,0,0,1,0,16.41" />
                  <path class="cls-4" d="M15.2,36.49H52.71a2.61,2.61,0,1,0,0-5.23H15.2a2.61,2.61,0,1,0,0,5.23" />
                  <path class="cls-3" d="M48.16,75.69a13.53,13.53,0,0,0-9.56,3.94,13.26,13.26,0,0,0,0,19,13.63,13.63,0,0,0,9.56,3.94,13.44,13.44,0,0,0,0-26.87m0,21.65a8.21,8.21,0,1,1,0-16.41,8.21,8.21,0,0,1,0,16.41" />
                  <path class="cls-3" d="M27.54,79.5H20.84v-8.7a2.61,2.61,0,0,0-5.23,0V82.11a2.62,2.62,0,0,0,2.61,2.61h9.31a2.62,2.62,0,0,0,0-5.23" />
                  <path class="cls-3" d="M149.92,33.16,127.78,14.82a2.58,2.58,0,0,0-1.67-.6H99.6V2.61A2.62,2.62,0,0,0,97,0H18.23a2.62,2.62,0,0,0-2.62,2.61V25.25a2.62,2.62,0,1,0,5.23,0v-20H94.4V79.5H68.57a2.61,2.61,0,0,0,0,5.23h37.75a2.61,2.61,0,1,0,0-5.23H99.63v-60H125.2l20.47,17-.22,43h-3.69a2.61,2.61,0,1,0,0,5.23H148a2.6,2.6,0,0,0,2.62-2.58l.25-46.88A2.76,2.76,0,0,0,149.92,33.16Z" />
                  <path class="cls-4" d="M8.89,50.53h0l37.51.22A2.66,2.66,0,0,0,49,48.15a2.59,2.59,0,0,0-2.58-2.64L9,45.3a2.61,2.61,0,0,0-2.64,2.58,2.59,2.59,0,0,0,2.58,2.65" />
                  <path class="cls-3" d="M126.93,29.21a2.52,2.52,0,0,0-1.74-.67H109.32a2.62,2.62,0,0,0-2.62,2.61V56.51a2.62,2.62,0,0,0,2.62,2.62h25.17a2.62,2.62,0,0,0,2.62-2.62v-17a2.62,2.62,0,0,0-.86-1.94Zm4.95,24.68H111.94V33.74h12.22l7.72,6.94Z" />
                  <path class="cls-4" d="M42.74,62.17a2.62,2.62,0,0,0-2.62-2.61H2.62a2.61,2.61,0,1,0,0,5.23H40.12a2.62,2.62,0,0,0,2.62-2.62" />
                </svg>
                <p>Distribution</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="healthcare" class="tile-radio" type="radio" ng-model="data.industry" value="healthcare" />
              <label for="healthcare">
                <svg id="dna" viewBox="0 0 47.27 103.98">
                  <defs><style>.cls-3{fill:#026cb6;}.cls-4{fill:#e2704d;}</style></defs>
                  <path class="cls-3" d="M24.58,73.5C17,70,11.34,65.93,8,61.44h25a2.36,2.36,0,1,0,0-4.73H5.67A16.78,16.78,0,0,1,4.73,52c0-7.33,6.14-13,11.11-16.54a2.39,2.39,0,1,0-2.6-4C4.49,37.58,0,44.67,0,52c0,9.93,8,19.14,22.69,25.76,8.74,4,14.89,9,18,14.42H14.18a2.36,2.36,0,1,0,0,4.73H42.3a8,8,0,0,1,.24,2.36v2.36a2.36,2.36,0,0,0,4.73,0V99.26c0-9.93-8-19.14-22.69-25.76" />
                  <path class="cls-4" d="M16.54,79.41a2.32,2.32,0,0,0-3.31-.71C4.49,84.84,0,91.93,0,99.26v2.36A2.23,2.23,0,0,0,2.36,104a2.23,2.23,0,0,0,2.36-2.36V99.26c0-7.33,6.15-13,11.11-16.54a2.32,2.32,0,0,0,.71-3.31" />
                  <path class="cls-4" d="M24.58,26.23c-8.74-4-14.89-9-18-14.42H33.09a2.23,2.23,0,0,0,2.36-2.36,2.23,2.23,0,0,0-2.36-2.36H5a8,8,0,0,1-.24-2.36V2.36A2.23,2.23,0,0,0,2.36,0,2.23,2.23,0,0,0,0,2.36V4.73c0,9.93,8,19.14,22.69,25.76C30.25,34,35.92,38,39.23,42.54H14.18a2.36,2.36,0,1,0,0,4.73H41.59A16.79,16.79,0,0,1,42.54,52c0,7.33-6.15,13.23-11.34,16.78a2.33,2.33,0,0,0-.71,3.31,2.15,2.15,0,0,0,1.89.94,3.35,3.35,0,0,0,1.42-.47c8.74-5.91,13.47-13,13.47-20.56,0-9.93-8-19.14-22.69-25.76" />
                  <path class="cls-3" d="M44.9,0a2.23,2.23,0,0,0-2.36,2.36V4.73c0,7.33-6.15,13.23-11.34,16.78a2.32,2.32,0,0,0-.71,3.31,2.15,2.15,0,0,0,1.89.94,3.37,3.37,0,0,0,1.42-.47c8.74-5.91,13.47-13,13.47-20.56V2.36A2.23,2.23,0,0,0,44.9,0" />
                </svg>
                <p>Healthcare/Life Sciences</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="manufacturing" class="tile-radio" type="radio" ng-model="data.industry" value="manufacturing" />
              <label for="manufacturing">
                <svg id="gears" viewBox="0 0 107.12 106.19">
                  <defs><style>.cls-3{fill:#026cb6;}.cls-4{fill:#e2704d;}</style></defs>
                  <path class="cls-3" d="M75.68,82.7a1.47,1.47,0,0,1-1.92.81l-4.94-2.05a2,2,0,0,0-2.41.72A30.23,30.23,0,0,1,58,90.58a2,2,0,0,0-.72,2.4l2,4.94a1.47,1.47,0,0,1-.81,1.92l-5.38,2.25a1.47,1.47,0,0,1-1.92-.81l-2.05-4.94a2,2,0,0,0-2.21-1.18,30.27,30.27,0,0,1-11.89,0,2,2,0,0,0-2.21,1.18l-2.05,4.94a1.49,1.49,0,0,1-1.92.81l-5.38-2.23a1.49,1.49,0,0,1-.81-1.94L24.73,93a2,2,0,0,0-.72-2.4,30.23,30.23,0,0,1-8.41-8.41,2,2,0,0,0-2.4-.72L8.26,83.5a1.46,1.46,0,0,1-1.92-.81L4.1,77.32a1.47,1.47,0,0,1,.81-1.92l4.94-2.06A2,2,0,0,0,11,71.13a30.27,30.27,0,0,1,0-11.89A2,2,0,0,0,9.85,57L4.91,55A1.49,1.49,0,0,1,4.1,53l2.23-5.38a1.49,1.49,0,0,1,1.95-.81l4.94,2.05a2,2,0,0,0,2.4-.72A30.24,30.24,0,0,1,24,39.77a2,2,0,0,0,.72-2.4L22.7,32.43a1.49,1.49,0,0,1,.81-1.94l5.38-2.23a1.47,1.47,0,0,1,1.92.81L32.86,34a2,2,0,0,0,3.65-1.51l-2.06-4.94a5.45,5.45,0,0,0-7.1-3L22,26.84a5.43,5.43,0,0,0-3,2.95A5.52,5.52,0,0,0,19,34l1.44,3.47a34.36,34.36,0,0,0-7.23,7.23L9.76,43.23a5.52,5.52,0,0,0-4.17,0,5.42,5.42,0,0,0-3,3L.41,51.55a5.53,5.53,0,0,0,0,4.17,5.43,5.43,0,0,0,3,3l3.48,1.44a33.47,33.47,0,0,0,0,10.23L3.36,71.79a5.45,5.45,0,0,0-3,7.1L2.64,84.2a5.44,5.44,0,0,0,7.1,2.95l3.47-1.44a34.38,34.38,0,0,0,7.23,7.23L19,96.42a5.51,5.51,0,0,0,0,4.17,5.43,5.43,0,0,0,3,3l5.38,2.23a5.44,5.44,0,0,0,7.1-3l1.44-3.47a33.47,33.47,0,0,0,10.23,0l1.44,3.47a5.46,5.46,0,0,0,5,3.37,5.34,5.34,0,0,0,2.08-.42L60,103.54a5.45,5.45,0,0,0,3-7.1L61.54,93a34.41,34.41,0,0,0,7.23-7.23l3.47,1.44a5.43,5.43,0,0,0,7.1-3l2.23-5.38a5.52,5.52,0,0,0,0-4.17,5.42,5.42,0,0,0-2.95-2.95l-4.94-2.05a2,2,0,1,0-1.51,3.65l4.94,2.06a1.49,1.49,0,0,1,.81,1.94Z" />
                  <path class="cls-4" d="M40.88,51.66a2,2,0,1,0,0-4h0a17.47,17.47,0,0,0,.11,34.94h.13A17.46,17.46,0,0,0,58.43,65.06a2,2,0,0,0-2-2h0a2,2,0,0,0-2,2A13.51,13.51,0,0,1,41,78.7h-.11a13.52,13.52,0,0,1-9.61-23,13.65,13.65,0,0,1,9.57-4" />
                  <path class="cls-3" d="M102.62,38.2a4.51,4.51,0,0,0,4.5-4.5V29.48a4.51,4.51,0,0,0-4.5-4.5h-2.29a25.52,25.52,0,0,0-2.58-6.23l1.64-1.64a4.51,4.51,0,0,0,0-6.36l-3-3a4.46,4.46,0,0,0-3.17-1.31,4.39,4.39,0,0,0-3.17,1.31L88.42,9.4a25,25,0,0,0-6.23-2.58V4.5A4.51,4.51,0,0,0,77.69,0H73.45a4.51,4.51,0,0,0-4.5,4.5V6.82A25.52,25.52,0,0,0,62.72,9.4L61.08,7.76a4.47,4.47,0,0,0-3.17-1.31,4.39,4.39,0,0,0-3.17,1.31l-3,3a4.51,4.51,0,0,0,0,6.36l1.64,1.64A25,25,0,0,0,50.81,25H48.49a4.51,4.51,0,0,0-4.5,4.5v4.24a4.51,4.51,0,0,0,4.5,4.5h2.32a25.49,25.49,0,0,0,2.58,6.23l-1.64,1.64a4.51,4.51,0,0,0,0,6.36l3,3a4.46,4.46,0,0,0,3.17,1.31,4.39,4.39,0,0,0,3.17-1.31l1.64-1.64a25,25,0,0,0,6.23,2.58V58.7a4.51,4.51,0,0,0,4.5,4.5h4.24a4.51,4.51,0,0,0,4.5-4.5V56.36a25.46,25.46,0,0,0,6.23-2.58l1.64,1.64a4.46,4.46,0,0,0,3.17,1.31,4.39,4.39,0,0,0,3.17-1.31l3-3a4.51,4.51,0,0,0,0-6.36l-1.64-1.64a25,25,0,0,0,2.58-6.23Zm-5.81-2.36a21.33,21.33,0,0,1-3.23,7.8,2,2,0,0,0,.24,2.49l2.75,2.75a.53.53,0,0,1,0,.76l-3,3a.52.52,0,0,1-.37.15.49.49,0,0,1-.37-.15l-2.75-2.75a2,2,0,0,0-2.49-.24,21.67,21.67,0,0,1-7.8,3.23,2,2,0,0,0-1.6,1.94v3.89a.53.53,0,0,1-.53.53H73.42a.53.53,0,0,1-.52-.53V54.83a2,2,0,0,0-1.6-1.94,21.28,21.28,0,0,1-7.8-3.23,2,2,0,0,0-1.09-.33,1.94,1.94,0,0,0-1.4.59l-2.75,2.75a.52.52,0,0,1-.37.15.49.49,0,0,1-.37-.15l-3-3a.53.53,0,0,1,0-.76l2.75-2.75a2,2,0,0,0,.24-2.49,21.66,21.66,0,0,1-3.23-7.8,2,2,0,0,0-1.95-1.6H48.45a.53.53,0,0,1-.53-.52V29.48a.53.53,0,0,1,.53-.52h3.89a2,2,0,0,0,1.95-1.6,21.27,21.27,0,0,1,3.23-7.8,2,2,0,0,0-.24-2.49l-2.75-2.75a.52.52,0,0,1-.15-.37.49.49,0,0,1,.15-.37l3-3a.52.52,0,0,1,.37-.15.49.49,0,0,1,.37.15L61,13.31a2,2,0,0,0,2.49.24,21.67,21.67,0,0,1,7.8-3.23,2,2,0,0,0,1.6-1.95V4.5A.53.53,0,0,1,73.4,4h4.24a.53.53,0,0,1,.52.52V8.39a2,2,0,0,0,1.6,1.94,21.28,21.28,0,0,1,7.8,3.23,2,2,0,0,0,2.49-.24l2.75-2.75a.52.52,0,0,1,.37-.15.49.49,0,0,1,.37.15l3,3a.53.53,0,0,1,0,.77l-2.75,2.75a2,2,0,0,0-.24,2.49,21.68,21.68,0,0,1,3.24,7.8A2,2,0,0,0,98.73,29h3.89a.53.53,0,0,1,.53.52v4.24a.53.53,0,0,1-.53.52H98.73a1.91,1.91,0,0,0-1.92,1.57" />
                  <path class="cls-4" d="M75.54,18.88a12.7,12.7,0,1,0,12.7,12.7,12.71,12.71,0,0,0-12.7-12.7m0,21.44a8.74,8.74,0,1,1,8.74-8.74,8.74,8.74,0,0,1-8.74,8.74" />
                </svg>
                <p>Manufacturing</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="software" class="tile-radio" type="radio" ng-model="data.industry" value="software" />
              <label for="software">
                <svg id="layers" viewBox="0 0 431.19 348.31">
                  <defs><style>.class-3{fill:#026cb6;}.class-4{fill:none;}.class-5{fill:#e2704d;}</style></defs>
                  <path class="class-3" d="M42,261.47l80.32-34.81L215.59,264l93.28-37.31,80.31,34.8L215.59,330.91Zm0-84.32,80.32-34.8,93.27,37.31,93.28-37.3,80.31,34.8L309.06,209.2l-.94-.32-.38.84-92.15,36.86L123.4,209.71l-.45-.9-.88.37Zm81.41-51.75-1.35-.54L42,92.83,215.59,17.61,389.18,92.83l-80.13,32.05-.94-.32-.38.84-92.15,36.86ZM0,93.43,101.19,133.9,0,177.75l101.19,40.47L0,262.08l215.59,86.24,215.59-86.24L330,218.23l101.19-40.48L330,133.91,431.19,93.43,216.23.27,215.59,0Z" />
                  <polygon class="class-4" points="215.59 17.6 42 92.83 215.59 162.27 389.19 92.83 215.59 17.6" />
                  <polygon class="class-4" points="122.32 142.34 42 177.15 215.59 246.59 389.19 177.15 308.87 142.35 215.59 179.66 122.32 142.34" />
                  <polygon class="class-5" points="0 177.75 215.59 263.98 431.19 177.75 329.99 133.9 308.87 142.35 389.18 177.15 215.59 246.59 42 177.15 122.32 142.35 101.19 133.9 0 177.75" />
                </svg>
                <p>Software/Media</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="other" class="tile-radio" type="radio" ng-model="data.industry" value="other" />
              <label for="other">
                <svg id="dots" viewBox="0 0 67.46 18.8">
                  <defs><style>.cls-3{fill:#026cb6;}</style></defs>
                  <path class="cls-3" d="M9.4,0a9.4,9.4,0,1,0,9.4,9.4A9.41,9.41,0,0,0,9.4,0m0,15.48A6.08,6.08,0,1,1,15.48,9.4,6.09,6.09,0,0,1,9.4,15.48" />
                  <path class="cls-3" d="M58.06,0a9.4,9.4,0,1,0,9.4,9.4A9.41,9.41,0,0,0,58.06,0m0,15.48A6.08,6.08,0,1,1,64.14,9.4a6.09,6.09,0,0,1-6.08,6.08" />
                  <path class="cls-3" d="M33.73,0a9.4,9.4,0,1,0,9.4,9.4A9.41,9.41,0,0,0,33.73,0m0,15.48A6.08,6.08,0,1,1,39.81,9.4a6.09,6.09,0,0,1-6.08,6.08" />
                </svg>
                <p>Other</p>
              </label>
            </div>
          </div>
        </section>
        <section id="commerce-question" class="slide-section">
          <h2>What is your <b>current commerce solution</b>?</h2>
          <div class="select">
            <select id="existing" ng-model="data.commerce">
              <option value="none">None</option>
              <option value="legacy">Legacy</option>
              <option value="custom">Custom</option>
            </select>
            <svg wiewBox="0 0 24 24"><polyline points="4,8 12,16 20,8" /></svg>
          </div>
        </section>
        <div class="slide-section">
          <a href="#slide-2" class="button continue" ng-click="updateTotals()">NEXT: REVENUE <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></a>
        </div>
      </div>
      <div class="right">
        <div class="tooltip">
          <section>
            <h4>Industry Assumptions</h4>
            <p>You'll notice that some fields in this calculator will already contain figures. These are assumptions based on your industry.</p>
          </section>
          <section>
            <h4>Legacy</h4>
            <p>Select Legacy if using SAP Hybris, IBM Websphere Commerece, Oracle ATG, or a similar eCommerce vendor.</p>
            <h4>Custom</h4>
            <p>Select Custom if using an eCommerce solution that you developed in-house.</p>
          </section>
        </div>
      </div>
    </div>

    <div id="slide-2" class="slide">
      <div class="left">
        <section id="totalRev-question" class="single-input slide-section">
          <h2>What is your company's <b>total revenue</b>?</h2>
          <div class="money"><div><span>$</span></div><input id="totalRev" class="commas" ng-model="data.totalRevC" type="text" min="0" step="1000" placeholder="{{data.totalRevP | number}}" /></div>
        </section>
        <section id="contribution-question" class="slide-section">
          <h2>What is your <b>revenue distribution</b> by channel?</h2>
          <div class="legend row">
            <div class="digital-blue col-sm-3">&mdash; Digital</div><div class="traditional-green col-sm-3">&mdash; Traditional</div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-3 digital">
              <label for="digitalRevPercent">Digital</label>
              <div class="label-line"></div>
              <div class="percent"><input id="digitalRevPercent" ng-model="data.digitalRevPercent" class="revs" type="number" min="0" max="99" placeholder="{{data.digitalRevPercentP}}" /><div><span>%</span></div></div>
              <div class="calc"><span>{{data.digitalRev | currency:'$':0}}</span></div>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="directRevPercent">Direct Sales</label>
              <div class="label-line"></div>
              <div class="percent"><input id="directRevPercent" ng-model="data.directRevPercent" class="revs" type="number" min="0" max="99" placeholder="{{data.directRevPercentP}}" /><div><span>%</span></div></div>
              <div class="calc"><span>{{data.directRev | currency:'$':0}}</span></div>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="insideRevPercent">Inside Sales</label>
              <div class="label-line"></div>
              <div class="percent"><input id="insideRevPercent" ng-model="data.insideRevPercent" class="revs" type="number" min="0" max="99" placeholder="{{data.insideRevPercentP}}" /><div><span>%</span></div></div>
              <div class="calc"><span>{{data.insideRev | currency:'$':0}}</span></div>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="partnerRevPercent">Partner</label>
              <div class="label-line"></div>
              <div class="percent"><input id="partnerRevPercent" ng-model="data.partnerRevPercent"class="revs" type="number" min="0" max="99" placeholder="{{data.partnerRevPercentP}}" /><div><span>%</span></div></div>
              <div class="calc"><span>{{data.partnerRev | currency:'$':0}}</span></div>
            </div>
          </div>
          <div class="calc-line"><span>Revenue</span></div>
          <p>Your total revenue is at {{data.totalPercent}}%.</p>
        </section>
        <div class="slide-section">
          <a href="#slide-3" class="button continue">NEXT: ORDER VALUE <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></a>
          <a href="#slide-1" class="back"><svg width="10" height="10" viewBox="0 0 20 20"><polyline points="15,0 5,10 15,20" /></svg> BACK</a>
        </div>
      </div>
      <div class="right">
        <div class="tooltip">
          <section>
            <h4>Customize Your Revenue Distribution</h4>
            <p>We've allocated your traditional revenue across its three sub-channels: direct sales, inside sales and partner. Now's your chance to customize your revenue distribution further for a more accurate assessment of your buisness impact.</p>
          </section>
        </div>
      </div>
    </div>

    <div id="slide-3" class="slide">
      <div class="left">
        <section id="aov-question" class="slide-section">
          <h2>What is the <b>average order value</b> per channel?</h2>
          <div class="row">
            <div class="col-xs-6 col-sm-3 digital">
              <label for="digitalAOV">Digital</label>
              <div class="label-line-alt"></div>
              <div class="money"><div><span>$</span></div><input id="digitalAOV" class="commas" ng-model="data.digitalAOVC" type="text" min="0" placeholder="{{data.digitalAOVP | number: 0}}" /></div>
              <div class="calc"><span>{{data.digitalOrders | number: 0}}</span></div>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="directAOV">Direct Sales</label>
              <div class="label-line-alt"></div>
              <div class="money"><div><span>$</span></div><input id="directAOV" class="commas" ng-model="data.directAOVC" type="text" min="0" placeholder="{{data.directAOVP | number: 0}}" /></div>
              <div class="calc"><span>{{data.directOrders | number: 0}}</span></div>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="insideAOV">Inside Sales</label>
              <div class="label-line-alt"></div>
              <div class="money"><div><span>$</span></div><input id="insideAOV" class="commas" ng-model="data.insideAOVC" type="text" min="0" placeholder="{{data.insideAOVP | number: 0}}" /></div>
              <div class="calc"><span>{{data.insideOrders | number: 0}}</span></div>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="partnerAOV">Partner</label>
              <div class="label-line-alt"></div>
              <div class="money"><div><span>$</span></div><input id="partnerAOV" class="commas" ng-model="data.partnerAOVC" type="text" min="0" placeholder="{{data.partnerAOVP | number: 0}}" /></div>
              <div class="calc"><span>{{data.partnerOrders | number: 0}}</span></div>
            </div>
          </div>
          <div class="calc-line"><span>Number of Orders</span></div>
          <p>When we know the average order value, we can calculate the number of orders per channel and gain a much better understanding of how CloudCraze can benefit your sales results.</p>
        </section>
        <div class="slide-section">
          <a href="#slide-4" class="button continue">NEXT: ORDER ERRORS <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></a>
          <a href="#slide-2" class="back"><svg width="10" height="10" viewBox="0 0 20 20"><polyline points="15,0 5,10 15,20" /></svg> BACK</a>
        </div>
      </div>
      <div class="right">
        <div class="tooltip">
          <section>
            <h4>Customize Your Average Order Value</h4>
            <p>We've allocated your average order value across the three traditional sub-channels: direct sales, inside sales and partner. Here you can customize your average order value further for a more accurate assessment of your buisness impact.</p>
          </section>
        </div>
      </div>
    </div>

    <div id="slide-4" class="slide">
      <div class="left">
        <section class="error-question slide-section">
          <h2>No company is perfect, so don't be embarrassed.<br />What is your company's <b>order error rate</b>?</h2>
          <div class="row">
            <div class="col-xs-6 col-sm-3 digital">
              <label for="digitalError">Digital</label>
              <div class="label-line"></div>
              <div class="percent"><input id="digitalError" ng-model="data.digitalError" type="number" min="0" max="99" min-threshold="2" max-threshold="50" placeholder="{{data.digitalErrorP}}" /><div><span>%</span></div></div>
              <span class="threshold-warning">This value may lead to unrealistic results.</span>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="directError">Direct Sales</label>
              <div class="label-line"></div>
              <div class="percent"><input id="directError" ng-model="data.directError" type="number" min="0" max="99" min-threshold="2" max-threshold="50" placeholder="{{data.directErrorP}}" /><div><span>%</span></div></div>
              <span class="threshold-warning">This value may lead to unrealistic results.</span>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="insideError">Inside Sales</label>
              <div class="label-line"></div>
              <div class="percent"><input id="insideError" ng-model="data.insideError" type="number" min="0" max="99" min-threshold="2" max-threshold="50" placeholder="{{data.insideErrorP}}" /><div><span>%</span></div></div>
              <span class="threshold-warning">This value may lead to unrealistic results.</span>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="partnerError">Partner</label>
              <div class="label-line"></div>
              <div class="percent"><input id="partnerError" ng-model="data.partnerError" type="number" min="0" max="99" min-threshold="2" max-threshold="50" placeholder="{{data.partnerErrorP}}" /><div><span>%</span></div></div>
              <span class="threshold-warning">This value may lead to unrealistic results.</span>
            </div>
          </div>
          <p>Human error is unavoidable, but it's more prevalent with outdated commerce platforms that lack modern customization and automation features.</p>
        </section>
        <div class="slide-section">
          <a href="#slide-5" class="button continue">NEXT: TEAM INFO <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></a>
          <a href="#slide-3" class="back"><svg width="10" height="10" viewBox="0 0 20 20"><polyline points="15,0 5,10 15,20" /></svg> BACK</a>
        </div>
      </div>
      <div class="right">
        <div class="tooltip">
          <section>
            <h4>Customize the Industry Assumptions</h4>
            <p>We've estimated the average error rate for your industry, but please customize these numbers as you see fit.</p>
          </section>
        </div>
      </div>
    </div>

    <div id="slide-5" class="slide">
      <div class="left">
        <section id="teamSize-question" class="slide-section">
          <h2>What is the <b>size</b> of each sales team?</h2>
          <div class="row">
            <div class="col-xs-6 col-sm-3 digital">
              <label for="digitalTeamSize">Digital</label>
              <div class="label-line"></div>
              <input id="digitalTeamSize" ng-model="data.digitalTeamSize" type="number" min="0" placeholder="{{data.digitalTeamSizeP}}" />
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="directTeamSize">Direct Sales</label>
              <div class="label-line"></div>
              <input id="directTeamSize" ng-model="data.directTeamSize" type="number" min="0" placeholder="{{data.directTeamSizeP}}" />
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="insideTeamSize">Inside Sales</label>
              <div class="label-line"></div>
              <input id="insideTeamSize" ng-model="data.insideTeamSize" type="number" min="0" placeholder="{{data.insideTeamSizeP}}" />
            </div>
            <div class="col-xs-6 col-sm-3" class="hide">
            </div>
          </div>
        </section>
        <section id="teamSalary-question" class="slide-section">
          <h2>What is the <b>average salary</b> of your team members?</h2>
          <div class="row">
            <div class="col-xs-6 col-sm-3 digital">
              <label for="digitalSalary">Digital</label>
              <div class="label-line-alt"></div>
              <div class="money"><div><span>$</span></div><input id="digitalSalary" class="commas" ng-model="data.digitalSalaryC" type="text" min="0" step="1000" placeholder="{{data.digitalSalaryP | number: 0}}" /></div>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="directSalary">Direct Sales</label>
              <div class="label-line-alt"></div>
              <div class="money"><div><span>$</span></div><input id="directSalary" class="commas" ng-model="data.directSalaryC" type="text" min="0" step="1000" placeholder="{{data.directSalaryP | number: 0}}" /></div>
            </div>
            <div class="col-xs-6 col-sm-3 traditional">
              <label for="insideSalary">Inside Sales</label>
              <div class="label-line-alt"></div>
              <div class="money"><div><span>$</span></div><input id="insideSalary" class="commas" ng-model="data.insideSalaryC" type="text" min="0" step="1000" placeholder="{{data.insideSalaryP | number: 0}}" /></div>
            </div>
            <div class="col-xs-6 col-sm-3" class="hide">
            </div>
          </div>
        </section>
        <div class="slide-section">
          <a href="#slide-6" class="button continue">NEXT: EXPECTED BENEFITS <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></a>
          <a href="#slide-4" class="back"><svg width="10" height="10" viewBox="0 0 20 20"><polyline points="15,0 5,10 15,20" /></svg> BACK</a>
        </div>
      </div>
      <div class="right">
        <div class="tooltip">
          <section>
            <h4>Customize the Industry Assumptions</h4>
            <p>These numbers don't have to be perfect, but adjust them to be as close to your organization's as possible.</p>
          </section>
        </div>
      </div>
    </div>

    <div id="slide-6" class="slide">
      <div class="left">
        <section id="benefits-question" class="slide-section">
          <div class="slide-section">
            <h2>This is how you can <b>expect sales to increase</b> after implementing a new commerce solution like CloudCraze.</h2>
            <div class="row">
              <div class="col-xs-6">
                <label for="digitalIncrease">Digital Channel Order Increase</label>
                <div class="label-line"></div>
                <div class="percent">
                  <input id="digitalIncrease" ng-model="data.digitalIncrease" type="number" min="0" max="100" min-threshold="0" max-threshold="10" placeholder="{{data.digitalIncreaseP}}" />
                  <div><span>%</span></div>
                </div>
                <span class="threshold-warning">This value may lead to unrealistic results.</span>
              </div>
              <div class="col-xs-6 tip">
                <p>The digital channel typically provides a <b>5-10%</b> bump in order volume due to accessibility, wherever and whenever.</p>
              </div>
            </div>
          </div>
          <hr class="slide-section" />
          <div class="row slide-section">
            <div class="col-xs-6">
              <label for="businessBump">Ease-of-Doing-Business Bump</label>
              <div class="label-line"></div>
              <div class="percent">
                <input id="businessBump" ng-model="data.businessBump" type="number" min="0" max="100" min-threshold="0" max-threshold="3" placeholder="{{data.businessBumpP}}" />
                <div><span>%</span></div>
              </div>
              <span class="threshold-warning">This value may lead to unrealistic results.</span>
            </div>
            <div class="col-xs-6 tip">
              <p>Businesses generally see a <b>1-3% increase</b> in order value because customers can find and purchase products quickly and easily.</p>
            </div>
          </div>
          <div class="row slide-section">
            <div class="col-xs-6">
              <label for="crossSell">Cross-Sell &amp; Up-Sell Bump</label>
              <div class="label-line"></div>
              <div class="percent">
                <input id="crossSell" ng-model="data.crossSell" type="number" min="0" max="100" min-threshold="0" max-threshold="4" placeholder="{{data.crossSellP}}" />
                <div><span>%</span></div>
              </div>
              <span class="threshold-warning">This value may lead to unrealistic results.</span>
            </div>
            <div class="col-xs-6 tip">
              <p>An order value increase of <b>up to 4%</b> can be expected when your digital commerce platform supports more relevant cross-selling and up-selling suggestions for customers.</p>
            </div>
          </div>
          <div class="row slide-section">
            <div class="col-xs-6">
              <label for="newProduct">New Product Intro &amp; Promotion Bump</label>
              <div class="label-line"></div>
              <div class="percent">
                <input id="newProduct" ng-model="data.newProduct" type="number" min="0" max="100" min-threshold="0" max-threshold="30" placeholder="{{data.newProductP}}" />
                <div><span>%</span></div>
              </div>
              <span class="threshold-warning">This value may lead to unrealistic results.</span>
            </div>
            <div class="col-xs-6 tip">
              <p>When your commerce platform delivers personalized product recommendations, you can see an increase of <b>10-30%</b>.</p>
            </div>
          </div>
        </section>
        <div class="slide-section">
          <a href="#slide-7" class="button continue">CALCULATE MY ROI <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></a>
          <a href="#slide-5" class="back"><svg width="10" height="10" viewBox="0 0 20 20"><polyline points="15,0 5,10 15,20" /></svg> BACK</a>
        </div>
      </div>
      <div class="right">
        <div class="tooltip">
          <section>
            <h4>Customize the Industry Assumptions</h4>
            <p>You can fine-tune these expected bumps in order volume and value based on what you know about your current digital commerce platform, your employees, and your customers.</p>
          </section>
        </div>
      </div>
    </div>

    <div id="slide-7" class="slide">
      <div class="left">
        <section class="slide-section text-section">
          <h2>The ROI of Your Digital Transformation</h2>
          <p>Forrester projects that B2B commerce will grow to $1.2 trillion by 2021, making it the fastest-growing sub-sector in the commerce market. Why? Because enterprises are realizing significant returns on investment in customer-centric digital commerce, and no company wants to be left behind.</p>
          <p>Is it time to initiate your organization’s digital transformation? View and download your full Digital Commerce ROI Report to find out.</p>
          <a id="download-top" ng-href="{{data.url}}" target="_blank" class="button download disabled">DOWNLOAD CUSTOM ROI REPORT</a>
        </section>
        <section class="roi slide-section">
          <p>{{data.roi | number: 0}}%</p>
          <h2>First Year Return on Investment</h2>
          <p class="chart-text">Your ROI was calculated using average implementation costs and subsequent gross margin improvements over the first year.</p>
        </section>
        <section class="slide-section">
          <h2>3-Year Expectations</h2>
          <div class="row">
            <div class="col-sm-4 col-xs-12">
            </div>
            <div class="col-sm-4 col-xs-12">
            </div>
            <div class="col-sm-4 col-xs-12">
              <div class="year-legend">
                <div class="revenue">Revenue</div>
                <div class="break-even">Break Even</div>
              </div>
            </div>
          </div>
          <div id="threeYearChart" class="chart"></div>
          <div id="threeYearChart2" class="chart pdf"></div>
          <p class="chart-text">The results of a digital transformation tend to compound over the first three years. The above line chart reflects our projections of your organization’s three-year revenue expectations after implementation. We calculate that you will be able to break even after {{data.breakEvenLine}}.</p>
        </section>
        <section class="slide-section">
          <h2>Revenue</h2>
          <div class="row revenue result-numbers">
            <div class="col-sm-4 col-xs-12">
              <p>{{data.totalRevX | currency:'$':0}}</p>
              <p>Revenue <b>Before</b> Digital Transformation</p>
            </div>
            <div class="col-sm-4 col-xs-12">
              <p>{{data.totalRev2 | currency:'$':0}}</p>
              <p>Revenue <b>After</b> Digital Transformation</p>
            </div>
            <div class="col-sm-4 col-xs-12">
              <p><b>+{{data.totalRevIncrease | currency:'$':0}}</b></p>
              <p>Revenue Increase</p>
            </div>
          </div>
          <div class="row split-chart">
            <div class="col-sm-4 col-xs-12 oldRev">
              <div id="oldRevChart"></div>
            </div>
            <div class="col-sm-4 col-xs-12 newRev">
              <div id="newRevChart"></div>
            </div>
            <div class="col-sm-4 col-xs-12 revenue-legend">
              <div class="left-legend">
                <div class="digital">Digital</div>
                <div class="inside">Inside Sales</div>
              </div>
              <div class="right-legend">
                <div class="direct">Direct Sales</div>
                <div class="partner">Partner</div>
              </div>
            </div>
          </div>
          <p class="chart-text">After your digital transformation, a reduction in costs and increase in both digital order value and volume can produce significant revenue growth. Based on the figures you provided, your organization could see a revenue increase of {{data.growthRate * 100 | number: 1}}% and a gross margin increase of {{data.marginImpact * 100 | number: 1}}%. Currently, your organization’s digital channel is responsible for {{(data.digitalRevPercent || data.digitalRevPercentP) | number: 1}}% of sales. After the digital transformation, the share of revenue generated through the digital channel could increase to {{data.digitalRevPercent2 * 100 | number: 1}}%.</p>
        </section>
        <section class="slide-section">
          <h2>Costs</h2>
          <div class="row cost result-numbers">
            <div class="col-sm-4 col-xs-12">
              <p>{{data.totalCost | currency:'$':0}}</p>
              <p>Order Cost <b>Before</b> Digital Transformation</p>
            </div>
            <div class="col-sm-4 col-xs-12">
              <p>{{data.totalCost2 | currency:'$':0}}</p>
              <p>Order Cost <b>After</b> Digital Transformation</p>
            </div>
            <div class="col-sm-4 col-xs-12">
              <p><b>+{{data.totalCostSavings | currency:'$':0}}</b></p>
              <p>Order Cost Savings</p>
              <div class="cost-legend">
                <div class="before">Cost to Serve</div>
                <div class="after">Error Cost</div>
              </div>
            </div>
          </div>
          <div id="costsChart" class="chart"></div>
          <div id="costsChart2" class="chart pdf"></div>
          <p class="chart-text">Thanks to fewer errors and more efficient sales teams, order costs will decline after a digital transformation. It’s projected that your organization’s costs will decline {{(data.totalCostSavings / data.totalCost) * 100 | number: 1}}%.</p>
        </section>
        <section class="slide-section">
          <h2>Gross Margin</h2>
          <div class="row margin result-numbers">
            <div class="col-sm-4 col-xs-12">
              <p>{{data.totalMargin | currency:'$':0}}</p>
              <p>Gross Margin <b>Before</b> Digital Transformation</p>
            </div>
            <div class="col-sm-4 col-xs-12">
              <p>{{data.totalMargin2 | currency:'$':0}}</p>
              <p>Gross Margin <b>After</b> Digital Transformation</p>
            </div>
            <div class="col-sm-4 col-xs-12">
              <p><b>+{{data.totalMarginIncrease | currency:'$':0}}</b></p>
              <p>Gross Margin Increase</p>
              <div class="margin-legend">
                <div class="before1"></div><div class="before2"></div><div>Before</div>
                <div class="after1"></div><div class="after2"></div><div>After</div>
              </div>
            </div>
          </div>
          <div id="marginsChart" class="chart"></div>
          <div id="marginsChart2" class="chart pdf"></div>
          <p class="chart-text">A digital transformation improves the efficiency of every sales channel in your organization. As a result, you can expect a total gross margin increase of {{data.marginImpact * 100 | number: 1}}%.</p>
          <div class="calculations">
            <div>
              <b>Before Total&nbsp;&nbsp;[{{data.totalMargin / (999999 + 1) | currency:'$':0}}M]</b>
            </div>
            <div>=</div>
            <div>
              Digital [{{data.digitalMargin / (999999 + 1) | currency:'$':0}}M]
            </div>
            <div>+</div>
            <div>
              Direct [{{data.directMargin / (999999 + 1) | currency:'$':0}}M]
            </div>
            <div>+</div>
            <div>
              Inside [{{data.insideMargin / (999999 + 1) | currency:'$':0}}M]
            </div>
            <div>+</div>
            <div>
              Partner [{{data.partnerMargin / (999999 + 1) | currency:'$':0}}M]
            </div>
          </div>
          <div class="calculations">
            <div>
              <b>After Total&nbsp;&nbsp;[{{data.totalMargin2 / (999999 + 1) | currency:'$':0}}M]</b>
            </div>
            <div>=</div>
            <div>
              Digital [{{data.digitalMargin2 / (999999 + 1) | currency:'$':0}}M]
            </div>
            <div>+</div>
            <div>
              Direct [{{data.directMargin2 / (999999 + 1) | currency:'$':0}}M]
            </div>
            <div>+</div>
            <div>
              Inside [{{data.insideMargin2 / (999999 + 1) | currency:'$':0}}M]
            </div>
            <div>+</div>
            <div>
              Partner [{{data.partnerMargin2 / (999999 + 1) | currency:'$':0}}M]
            </div>
          </div>
        </section>
        <section class="text-section">
          <h2>It’s About More Than Commerce</h2>
          <p>When your business uses CloudCraze, your sales and marketing teams are able to connect with customers on a new level. Every member of your sales teams – digital, direct, inside sales and your partner network – is empowered with a holistic view of CRM data to make more sales with unprecedented efficiency. But it doesn’t stop there. With your commerce built on the cloud and your customer at the center of your brand experience, your entire operation enjoys:</p>
          <ul>
            <li><b>Greater Flexibility.</b> Sell anywhere, anytime and on any device with a fully branded, mobile storefront. With CloudCraze you have the flexibility you need to build the most engaging, relevant and contextual digital experience for your customers.</li>
            <li><b>More Cost Savings.</b> Cut down on the time your employees are spending on manual processes. Instead, allow the automation of payment and post-order customer experiences to streamline revenue.</li>
            <li><b>Faster Speed to Market.</b> Ditch the legacy, custom or first-gen SaaS system that’s been holding back your growth. CloudCraze allows you to quickly launch new products to meet time-sensitive customer demand.</li>
          </ul>
          <p>We built CloudCraze for every enterprise that’s frustrated with delays in time-to-market, limited channel engagement and the high cost of legacy commerce platforms.</p>
          <p>As you’re embarking on this journey towards a digital transformation, we understand that it will be helpful to have a roadmap to help you along the way. Download our free <a href="http://www.cloudcraze.com/resource/a-b2b-ecommerce-playbook/">B2B eCommerce Playbook</a> today.</p>
          <br />
          <a id="download-bottom" ng-href="{{data.url}}" target="_blank" class="button download disabled">DOWNLOAD CUSTOM ROI REPORT</a>
          <small>These results have been calculated with a set of assumptions that are intended to establish a baseline for further conversation and assessment. They are only a guide based on our experience. We invite you to engage further with us to develop a 360-degree, accurate evaluation of your business and the positive impact that CloudCraze may have.</small>
        </section>
      </div>
    </div>
  </div>
</div>
